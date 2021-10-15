<?php

namespace App\Http\Controllers;

use App\ActiviesLog;
use App\AddImages;
use App\Mail\infoMail;
use App\Memorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

//use Intervention\Image\Image;

class ImageController extends Controller
{
    public function addImage(){
        return view('admin.addImage');
    }

    public function allImages(){
        $images = AddImages::where('active',true)->get();
        return view('admin.images')
            ->with('images', $images);
    }

    public function store(Request $request, $slug){
        $request->validate([
            'image' => 'required|image|max:3072'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $resize = Image::make($file)->resize(400, 365)->encode('jpg');
            $hash = md5($resize->__toString());
            $path = "uploads/images/{$hash}.jpg";
            $resize->save(public_path($path));
            $url = "{$hash}.jpg";
        }

       $image = AddImages::create([
            'image' => $url,
            'slug' => $slug,
            'user_id' => auth()->user()->id,
        ]);

        ActiviesLog::create([
            'description' => 'shared an image',
            'subject_type' => 'App\Image',
            'subject_id' => $image->id,
            'causer_type' => 'App\User',
            'causer_id' => auth()->user()->id,
            'slug' => $slug
        ]);

        $memorial = Memorial::where('slug', $slug)->firstOrFail();

        if($memorial->created_by != auth()->user()->id) {
            Mail::to($memorial->users->email)->send(new infoMail($memorial));
        }

        session()->flash('message', 'Image Uploaded Successfully');
        return redirect()->back();

    }

    public function activateImages($image){
        $img = AddImages::findOrFail($image);

        $img->update([
            'active' => true
        ]);

        $activitylog = ActiviesLog::where('subject_id', $image);

        $activitylog->update([
            'active' => true
        ]);

        session()->flash('message', 'Image Unbanned successfully');

        return redirect()->back();
    }

    public function deactivateImages($image){
        $img = AddImages::findOrFail($image);

        $img->update([
            'active' => false
        ]);

        $activitylog = ActiviesLog::where('subject_id', $image);

        $activitylog->update([
            'active' => false
        ]);

        session()->flash('message', 'Image Banned successfully');

        return redirect()->back();
    }

    public function destroy(AddImages $image){
        $image->delete();

        $activitylog = ActiviesLog::where('subject_id', $image->id);

        $activitylog->delete();

        session()->flash('message','Image deleted successfully');

        return redirect()->back();
    }

    public function testimage($slug,$id){
//        return view('tribute.welcome');
        $image = AddImages::where('id', $id)->where('active', true)->firstOrFail();

        $image->delete();

        $activitylog = ActiviesLog::where('subject_id', $image->id);

        $activitylog->delete();

        session()->flash('message','Image deleted successfully');

        return redirect(route('gallery', $slug));

    }
}
