<?php

namespace App\Http\Controllers;

use App\Life;
use App\User;
use App\Payment;
use App\Stories;
use App\Tribute;
use App\Memorial;
use App\AddImages;
use Carbon\Carbon;
use App\Mail\MemorialMail;
use App\Mail\BannedMemorial;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\ActiviesLog;

use App\Mail\infoMail;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class MemorialController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'relationship' => 'required',
            'gender' => 'required',
            'plan_type' => 'required',
            'born_date' => 'required',
            'death_date' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd|max:3072',
        ]);

            $names = explode(" ", $request->name);
            if(is_array($names) && count($names) <= 1){
                return redirect()->back()->with('message','You need to input first name and last name or else the computer will assume that you do not have sense');
            }else {
                $first_name = $names[0];
                $last_name = $names[1];
                $fr = strtolower($first_name);
                $ln = strtolower($last_name);
            }



        $slug = $fr. '-' . $ln;

        // $born_date = $request->born_year . '-' .  $request->born_month . '-' . $request->born_day;
        // $death_date = $request->death_year . '-' .  $request->death_month . '-' . $request->death_day;

        $first_name = ucfirst($first_name);
        $last_name = ucfirst($last_name);

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/memorial', $filename);
            $image = $filename;
        }

        $now = Carbon::now();
        if($request->plan_type == 'free'){
            $expiry_date = $now->addMonth();
        }else if($request->plan_type == 'yearly'){
            $expiry_date = $now->addYear();
        }else if ($request->plan_type == 'lifeTime'){
            $expiry_date = $now->addYears(100   );
        }else {
            $expiry_date = $now->addYears(100);
        }

        $memorial = Memorial::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'relationship' => $request->relationship,
            'gender' => $request->gender,
            'created_by' => auth()->user()->id,
            'born_date' => Carbon::parse($request->born_date),
            'passed_away_date' => Carbon::parse($request->death_date),
            'picture' => $image,
            'plan_type' => $request->plan_type,
//            'plan_type' => 'NULL',
            'expiry_date' => $expiry_date
//            'expiry_date' => NULL
        ]);

//        dd($memorial);
//        $position = Location::get(\request()->ip());
//        $location = $position->cityName . '/' . $position->countryName;
    if($request->plan_type != 'free'){
        Payment::create([
        'ip_address' => \request()->ip(),
        // create a location column and get it so users can know what currency to pay
        'location' => 'Abuja/Nigeria',
        'user_id' => \auth()->user()->id,
        'slug' => $memorial->slug,
        'memorial_id' => $memorial->id,
        'amount' => $request->amount,
        'reference' => $request->reference,
    ]);
}
//        dd($request->all());

        Mail::send(new MemorialMail($memorial));

        session()->flash('message', 'Memorial Created Successfully');
//        return redirect()->back();
        return redirect('manage-memorial/'.$memorial->slug);
    }

    public  function  createMemorial(){
        return view('tribute.createMemorial')
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get());
    }



public function getInitials($stringName){
     $names = explode(" ", $stringName);
            $first_name = $names[0];
            $last_name = $names[1];

        $fr = strtoupper($first_name);
        $ln = strtoupper($last_name);
        $initials = $fr[0].$ln[0];
    return $initials;
}
    public function myaccount($id){
        $user = User::where('id', $id)->firstOrFail();
//        $user = User::findOrFail($id);

        return view('accounts.myaccount')
            ->with('user', $user)
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get());
    }

    public function dashboard(){
        return view('accounts.dashboard')
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get());
    }

    public function memorials(){
        $details = Memorial::where('created_by', auth()->user()->id)->get();
        $count = Memorial::countUserMemorials();
        $mostViewed = Memorial::where('active',true)->where('page_views',Memorial::max('page_views'))->first();
        // dd($mostViewed);
//        $payment = Payment::getPayment();
        return view('accounts.memorials')
            ->with('details', $details)
            ->with('mostViewed', $mostViewed)
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get())
            ->with('count', $count);
//            ->with('payment', $payment);

    }

    public function viewMemorial($slug){
        $stories = Stories::where('slug',$slug)->get();
        $tributes = Tribute::where('slug',$slug)->get();
        $life = Life::where('slug',$slug)->first();
        $images = AddImages::where('slug',$slug)->get();

        $detail = Memorial::where('slug', $slug)->firstOrFail();

         $detail->page_views ++;
        $detail->save();
        // $detail->update()
        return view('tribute.memorialView')->with([
            'detail'=>$detail,
            'tributes'=>$tributes,
            'life'=> $life,
            'stories'=> $stories,
            'images'=>$images,]);
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->firstOrFail();
        $email = $request->email;
        if($email == $user->email){
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
        }else {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users'
            ]);
        }

        $user->update($data);

        session()->flash('message', 'Details Updated successfully');

        return redirect()->back();
    }

    public function addAbout(Request $request,$slug){
        $memorial = Memorial::where('slug',$slug)->get();
        $about = $request->about;
        $memorial->update('main_section_text',$about);
         session()->flash('message', 'Details Updated successfully');

        return redirect()->back();
    }

    public function forPassword($id){
        $user = User::where('id', $id)->firstOrFail();
        return view('accounts.password')
            ->with('user', $user)
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get());
    }

    public function changePassword(Request $request)
    {
        if(Auth::Check())
        {
            $requestData = $request->All();
            $validator = $this->validatePasswords($requestData);
            if($validator->fails())
            {
                return back()->withErrors($validator->getMessageBag());
            }
            else
            {
                $currentPassword = Auth::User()->password;
                if(Hash::check($requestData['password'], $currentPassword))
                {
                    $userId = Auth::User()->id;
                    $user = User::find($userId);
                    $user->password = Hash::make($requestData['new-password']);;
                    $user->save();
                    return back()->with('message', 'Your password has been updated successfully.');
                }
                else
                {
                    return back()->withErrors(['Sorry, your current password was not recognised. Please try again.']);
                }
            }
        }
        else
        {
            // Auth check failed - redirect to domain root
            return redirect()->to('/');
        }
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Please enter your current password',
            'new-password.required' => 'Please enter a new password',
            'new-password-confirmation.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'new-password' => ['required', 'same:new-password', 'min:1', Rule::notIn($this->bannedPasswords())],
            'new-password-confirmation' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    /**
     * Get an array of all common passwords which we don't allow
     *
     * @return array
     */
    public function bannedPasswords(){
        return [
            'password', '12345678', '123456789', 'baseball', 'football', 'jennifer', 'iloveyou', '11111111', '222222222', '33333333', 'qwerty123'
        ];
    }

    public function generalInfo(Request $request, $slug){
        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        $request->validate([
            'born_year' => 'required',
            'born_month' => 'required',
            'born_day' => 'required',
            'death_year' => 'required',
            'death_month' => 'required',
            'death_day' => 'required'
        ]);

        $born_date = $request->born_year . '-' .  $request->born_month . '-' . $request->born_day;
        $death_date = $request->death_year . '-' .  $request->death_month . '-' . $request->death_day;

//        dd($death_date);

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'relationship' => 'required',
            'gender' => 'required',
            'birth_state' => 'required',
            'birth_country' => 'required',
            'death_state' => 'required',
            'death_country' => 'required',
            'picture' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd|max:3072',
            'music' => 'mimes:mp3|max:3072',
        ]);

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/memorial', $filename);
            $image = $filename;

            $data['picture'] = $image;
        }else {
            $image = 'NULL';
        }


        $data['born_date'] = $born_date;
        $data['passed_away_date'] = $death_date;

        $memorial->slug = null;

        $memorial->update($data);

        session()->flash('message', 'Website Updated successfully');

        return redirect($memorial->slug . '/about');

    }

    public function personalPhrase(Request $request, $slug){
        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        $data = $request->validate([
            'main_section_text' =>  'required|max:4999'
        ]);

        $memorial->update($data);

        return  session()->flash('message', 'Details Updated successfully');

        return redirect()->back();;

    }

    public function life(Request $request, $slug){
        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        $data = $request->validate([
            'life' => 'required|max:5000'
        ]);

        $memorial->update($data);

        session()->flash('message', 'Life Section Updated successfully');

        return redirect()->back();
    }

    public function renew($memorial){
        return view('accounts.renew')
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get())
            ->with('id', $memorial);
    }

    public function storeRenew(Request $request, $memorial)
    {

        $now = Carbon::now();
        if ($request->plan_type == 'monthly') {
            $expiry_date = $now->addMonth();
        } else if ($request->plan_type == 'yearly') {
            $expiry_date = $now->addYear();
        } else {
            $expiry_date = $now->addYears(100);
        }

        $mem = Memorial::find($memorial);

        $mem->update([
            'plan_type' => $request->plan_type,
            'expiry_date' => $expiry_date
        ]);

//        $position = Location::get(\request()->ip());
//        $location = $position->cityName . '/' . $position->countryName;

        Payment::create([
            'ip_address' => \request()->ip(),
            'location' => 'Abuja/Nigeria',
            'user_id' => \auth()->user()->id,
            'slug' => $mem->slug,
            'memorial_id' => $mem->id,
            'amount' => $request->amount,
            'reference' => $request->reference,
        ]);

        session()->flash('message', 'Subscription Renewed Successfully');

        return redirect(route('memorials'));

    }
    public function upgrade($memorial){
        return view('accounts.upgrade')
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get())
            ->with('id', $memorial);
    }

    public function storeUpgrade(Request $request, $memorial)
    {

        $mem = Memorial::find($memorial);

        $now = $mem->expiry_date;
        if ($request->plan_type == 'monthly') {
            $expiry_date = $now->addMonth();
        } else if ($request->plan_type == 'yearly') {
            $expiry_date = $now->addYear();
        } else {
            $expiry_date = $now->addYears(100);
        }


        $mem->update([
            'plan_type' => $request->plan_type,
            'expiry_date' => $expiry_date
        ]);

//        $position = Location::get(\request()->ip());
//        $location = $position->cityName . '/' . $position->countryName;

        Payment::create([
            'ip_address' => \request()->ip(),
            'location' => 'Abuja/Nigeria',
            'user_id' => \auth()->user()->id,
            'slug' => $mem->slug,
            'memorial_id' => $mem->id,
            'amount' => $request->amount,
            'reference' => $request->reference,
        ]);

        session()->flash('message', 'Subscription Upgraded Successfully');

        return redirect(route('memorials'));

    }

    public function paymentdetails(){
        $details = Payment::where('user_id', auth()->user()->id)->get();
        // $memorial = Memorial::where('id',$details->memorial_id)->first();
        return view('accounts.paymentdetails')
            // ->with('memorial', $memorial)
            ->with('details', $details);
    }

    public function activateMemorial($memorial){
        $mem = Memorial::findOrFail($memorial);

        $mem->update([
            'active' => true
        ]);

        session()->flash('message', 'Memorial Activated Successfully');

        return redirect()->back();
    }

    public function suspend($memorial){
        $mem = Memorial::findOrFail($memorial);
        $memo = Memorial::where('id', $memorial)->firstOrFail();

        $mem->update([
            'active' => false
        ]);

        Mail::to($memo->users->email)->send(new BannedMemorial($mem));

        session()->flash('message', 'Memorial Suspended Successfully');

        return redirect()->back();
    }

    public function destroyMemorial($slug){
        $memorial = Memorial::where('slug', $slug)->firstOrFail();

        $memorial->delete();

        session()->flash('message', 'Memorial Deleted Successfully');

        return redirect()->back();
    }








    // MANAGE MEMORIAL
    public function manageMemorialForm(Request $request,$slug){
        // dd($request->all());
        $memorial = Memorial::where('slug',$slug)->where('active','true');
        // Validate Inputs
        
            dd($request->all());
         $request->validate([
            'life' => 'required',
            'story' => 'max:1000',
            'about' => 'required',
            'image' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd|max:3072',
            'image.*' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd|max:3072',
            'story-image' => 'mimes:jpg,jpeg,gif,png,bmp,svg,svgz,cgm,djv,djvu,ico,ief,jpe,pbm,pgm,pnm,ppm,ras,rgb,tif,tiff,wbmp,xbm,xpm,xwd|max:3072',
            'visibility'=> 'required',        
            ]);


            // Hash Image
        if($request->hasFile('image')){
            dd($request->all());
            $file = $request->file('image');
            $resize = Image::make($file)->resize(400, 365)->encode('jpg');
            $hash = md5($resize->__toString());
            $path = "uploads/images/{$hash}.jpg";
            $resize->save(public_path($path));
            $url = "{$hash}.jpg";
        }
dd($url);
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

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

         if($request->hasFile('story_image')){
            $file = $request->file('story_image');
            $extension = $file->getClientOriginalExtension();
            if(in_array($extension, $imageExtensions)) {
                $filename = time() . '.' . $extension;
                $file->move('uploads/story', $filename);
                $story_image = $filename;
            }else {
//                $image = '';
                return session()->flash('error','The file has to be an image');
            }
        }else{
            $story_image = '';
        }


        
// Create Story
if ($request->story!= ''){


           $story = Stories::create([
            'story' => $request->story,
            'user_id' => auth()->user()->id,
            'image' => $story_image,
            'slug' => $slug,
        ]);
// Story Activity
        ActiviesLog::create([
            'description' => 'shared a story',
            'subject_type' => 'App\Stories',
            'subject_id' => $story->id,
            'causer_type' => 'App\User',
            'causer_id' => auth()->user()->id,
            'slug' => $slug
        ]);
        }
        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        if($memorial->created_by != auth()->user()->id) {
            Mail::to($memorial->users->email)->send(new infoMail($memorial));
        }

// get memorial
        // $memorial = Memorial::where('slug',$slug)->where('active','true')->get();
        // update memorial
        // dd($request->all());
            $memorial->update([
                'main_section_text' =>$request->about,
                'isPublic' => $request->visibility,
            ]);
            // Create life story
            $life = Life::where('slug',$slug);
            if ($life->count() == 1){
        // dd($request->all());
$life->update(
    [
            'life' => $request->life,
    ]
);
            }else{
                // dd($request->life);
                Life::create([
            'life' => $request->life,
            'user_id' => auth()->user()->id,
            'slug' => $slug
        ]); 
            }
       

        
        return  redirect('memorial-view/'.$slug);


    }
}