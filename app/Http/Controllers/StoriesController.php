<?php

namespace App\Http\Controllers;

use App\ActiviesLog;
use App\Mail\infoMail;
use App\Mail\RegistrationMail;
use App\Memorial;
use App\Stories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Spatie\Activitylog\Models\Activity;

class StoriesController extends Controller
{
    public function store(Request $request, $slug){
        $request->validate([
            'story' => 'required|max:1000',
            'image' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd'
       ]);

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if(in_array($extension, $imageExtensions)) {
                $filename = time() . '.' . $extension;
                $file->move('uploads/story', $filename);
                $image = $filename;
            }else {
//                $image = '';
                return session()->flash('error','The file has to be an image');
            }
        }else{
            $image = '';
        }

        $story = Stories::create([
            'story' => $request->story,
            'user_id' => auth()->user()->id,
            'image' => $image,
            'slug' => $slug,
        ]);

        ActiviesLog::create([
            'description' => 'shared a story',
            'subject_type' => 'App\Stories',
            'subject_id' => $story->id,
            'causer_type' => 'App\User',
            'causer_id' => auth()->user()->id,
            'slug' => $slug
        ]);

//        $activity = new Activity();
//
//        $story->$activity->update([
//            'from' => $request->from,
//        ]);
        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        if($memorial->created_by != auth()->user()->id) {
            Mail::to($memorial->users->email)->send(new infoMail($memorial));
        }

        session()->flash('message', 'Story Saved Successfully');
        return redirect()->back();
    }

    public function edit(Stories $story){
        return view('admin.createStory')
            ->with('data', $story);
    }

    public function update(Request $request, Stories $story){
        $data = $request->validate([
            'story' => 'required',
            'image' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd',
        ]);

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if(in_array($extension, $imageExtensions)) {
                $filename = time() . '.' . $extension;
                $file->move('uploads/story', $filename);
                $image = $filename;
                $data['image'] = $image;

            }else {
//                $image = '';
                return session()->flash('error','The file has to be an image');
            }
        }else{
            $image = '';
        }

        $story->update($data);

        session()->flash('message', 'Story Updated successfully');

        return redirect()->back();
    }

    public function activateStories($story){
        $sto = Stories::findOrFail($story);

        $sto->update([
            'active' => true
        ]);

        $activitylog = ActiviesLog::where('subject_id', $story);

        $activitylog->update([
            'active' => true
        ]);

        session()->flash('message', 'Story Unbanned successfully');

        return redirect()->back();
    }

    public function deactivateStories($story){
//        dd($story);
        $sto = Stories::findOrFail($story);

        $sto->update([
            'active' => false
        ]);

        $activitylog = ActiviesLog::where('subject_id', $story);

        $activitylog->update([
            'active' => false
        ]);

        session()->flash('message', 'Story Banned successfully');

        return redirect()->back();
    }

    public function destroy(Stories $story){

//        dd($story->id);
        $story->delete();

        $activitylog = ActiviesLog::where('subject_id', $story->id);

        $activitylog->delete();

        session()->flash('message','Story deleted successfully');

        return redirect()->back();
    }

}


// returns Intervention\Image\Image
//$resize = Image::make($path)->resize(810, 837)->encode('jpg');
//
//// calculate md5 hash of encoded image
//$hash = md5($resize->__toString());
//
//// use hash as a name
//$path = "images/{$hash}.jpg";
//
//// save it locally to ~/public/images/{$hash}.jpg
//$resize->save(public_path($path));
//
//// $url = "/images/{$hash}.jpg"
//$url = "/" . $path;
