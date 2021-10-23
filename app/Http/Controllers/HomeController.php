<?php

namespace App\Http\Controllers;

use App\ActiviesLog;
use App\AddImages;
use App\IPaddress;
use App\Life;
use App\Memorial;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Session;
use App\Stories;
use App\Tribute;
use App\User;
use GuzzleHttp\Cookie\SessionCookieJar;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $view;
    public $check;


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home')
            ->with('trans', new Payment());
    }

    public function story(){
        return view('admin.story')
            ->with('stories', Stories::orderBy('created_at', 'DESC')->where('active', true)->get());
    }

    public function payment(){
        return view('admin.payment')
            ->with('payment', Payment::all());
    }

    public function adminMemorials(){
        $memorials = Memorial::where('plan_type', 'lifetime')->where('active', true)->get();
        return view('admin.memorials')
            ->with('memorials', $memorials);
    }

    public function adminFreeMemorials(){
        $memorials = Memorial::where('plan_type', 'free')->where('active',true)->get();
        return view('admin.freemem')
            ->with('memorials', $memorials);
    }

    public function adminYearlyMemorials(){
        $memorials = Memorial::where('plan_type', 'yearly')->where('active', true)->get();
        return view('admin.yearlymem')
            ->with('memorials', $memorials);
    }

    public function adminMonthlyMemorials(){
        $memorials = Memorial::where('plan_type', 'monthly')->where('active', true)->get();
        return view('admin.monthlymem')
            ->with('memorials', $memorials);
    }

    public function adminSuspendedMemorials(){
        $memorials = Memorial::where('active', false)->get();
        return view('admin.suspendedMemorials')
            ->with('memorials', $memorials);
    }

    public function adminBannedTributes(){
        $tributes = Tribute::where('active', false)->get();
        return view('admin.bannedTributes')
            ->with('tributes', $tributes);
    }

    public function adminBannedStories(){
        $stories = Stories::where('active', false)->get();
        return view('admin.bannedStories')
            ->with('stories', $stories);
    }

    public function adminBannedImages(){
        $images = AddImages::where('active', false)->get();
        return view('admin.bannedImages')
            ->with('images', $images);
    }

    public function memDetails($slug){
        $mem = Memorial::where('slug', $slug)->firstOrFail();
        return view('admin.showMem')
            ->with('mem', $mem);
    }

    public function welcome($slug){
        session()->put('backUrl', $slug);
        $tri = Tribute::orderBy('created_at', 'desc')->take(3)->where('slug', $slug)->where('active', true)->get();
        $act = ActiviesLog::orderBy('created_at', 'desc')->where('slug', $slug)->take(5)->where('active', true)->get();
        $details = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
        $ip_address = IPaddress::where('slug',$slug)->get()->toArray();
        $array = get_object_vars((object)$ip_address);
        $x = 0;
        $y = count($array);
        $array1 = [];

        for($x; $x < $y; $x++ ){
            $check = $array[$x]['ip_address'];
            array_push($array1, $check);
        }

        if(!in_array(\request()->ip(), $array1)){
            $view = $details->page_views + 1;
            $details->update([
            'page_views' => $view
            ]);

            IPaddress::create([
                'ip_address' => \request()->ip(),
                'slug' => $slug
            ]);
        }

        return view('tribute.welcome')
            ->with('tribute', $tri)
            ->with('activities', $act)
            ->with('slug',$slug)
            ->with('detail', $details);
    }

    public function tribute($slug){
        session()->put('backUrl', $slug . '/tribute');
        $act = ActiviesLog::orderBy('created_at', 'desc')->where('slug', $slug)->where('active', true)->take(5)->get();
        $details = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
        $user = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
        return view('tribute.tribute')
            ->with('tributes', Tribute::orderBy('created_at', 'DESC')->where('active', true)->where('slug',$slug)->simplepaginate(5))
            ->with('slug', $slug)
            ->with('user', $user)
            ->with('activities', $act)
            ->with('detail', $details);
    }

    public function gallery($slug){
        session()->put('backUrl', $slug . '/gallery');
        $act = ActiviesLog::orderBy('created_at', 'desc')->where('active', true)->where('slug', $slug)->take(5)->get();
        $details = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
//        $img = Image::make('img/single/aside/4.jpg')->resize(810, 837);
        $images = AddImages::where('slug',$slug)->where('active', true)->get();
//        dd($slug);
        return view('tribute.gallery')
//            ->with('img', $img->save('img/single/aside/4.jpg'))
            ->with('images', $images)
            ->with('slug', $slug)
            ->with('activities', $act)
            ->with('detail', $details);
    }

    public function stories($slug){
        session()->put('backUrl', $slug . '/stories');
        $act = ActiviesLog::orderBy('created_at', 'desc')->where('active', true)->where('slug', $slug)->take(5)->get();
        $details = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
        $user = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();
        return view('tribute.stories')
            ->with('stories', Stories::orderBy('created_at', 'DESC')->where('active', true)->where('slug', $slug)->simplepaginate(5))
            ->with('slug', $slug)
            ->with('user', $user)
            ->with('activities', $act)
            ->with('detail', $details);
    }
    public function userCreatedStories(){
        session()->put('backUrl');
        $stories = Stories::where('user_id',auth()->user()->id)->get();

        return view('tribute.stories')
            ->with('stories', $stories);
    }

    public function userCreatedTributes(){
        session()->put('backUrl');
        $tributes = Tribute::where('user_id',auth()->user()->id)->get();

        return view('tribute.tributes')
            ->with('tributes', $tributes);
    }


    public function manageMemorial($slug){
        session()->put('backUrl');
        $memorial = Memorial::where('slug',$slug)->first();
        // $memorial = Memoriel::where('user_id',auth()->user()->id)->first();
        // $memorial = Memoriel::where('user_id',auth()->user()->id)->first();
        $activities = ActiviesLog::orderBy('created_at', 'desc')->where('slug', $slug)->take(5)->where('active', true)->get();

        return view('tribute.manage-memorial')
            ->with('memorial', $memorial)
            ->with('activities', $activities);
    }


    public function programme(){
        return view('tribute.program');
    }

    public function alltributes(){
        return view('admin.tributes')
            ->with('tributes', Tribute::orderBy('created_at', 'DESC')->where('active', true)->get());
    }

    public function addStories(){
        return view('admin.createStory');
    }

    public function addTributes(){
        return view('admin.createTribute');
    }

    public function usersCount(){
        $users = User::where('role', 'user')->where('isBan', false)->get();
        return view('admin.users')
            ->with('users', $users);
    }

    public function usersBanned(){
        $users = User::where('role', 'user')->where('isBan', true)->get();
        return view('admin.bannedUsers')
            ->with('users', $users);
    }

    public function life($slug){
        session()->put('backUrl', $slug . '/life');
        $act = ActiviesLog::orderBy('created_at', 'desc')->where('active', true)->where('slug', $slug)->take(5)->get();
        $details = Memorial::where('slug', $slug)->firstOrFail();
        return view('tribute.life')
            ->with('slug', $slug)
            ->with('activities', $act)
            ->with('detail' , $details);
    }

    public function landingpage(){
        session()->put('backUrl', '/');
        $search = request()->query('query');
        if($search){
            $memorial = Memorial::where('last_name', 'LIKE', "%{$search}%")->where('active', true)->get(); // ->simplePaginate(3)
        }else {
            $memorial = Memorial::orderBy('created_at', 'desc')->where('active', true)->where('main_section_text', '!=', NULL)->take(3)->get();
        }

        $count = Memorial::orderBy('created_at', 'desc')->where('active', true)->where('main_section_text', '!=', NULL)->count();
//
        if(auth()->user()) {
            $memorialtype = Memorial::where('created_by', auth()->user()->id)->where('plan_type', 'free')->where('active', true)->exists();
            if($memorialtype){
                $memorialz = Memorial::where('created_by', auth()->user()->id)->where('plan_type', 'free')->where('active', true)->first();
//                dd($memorialz->slug);
            }else{
                $memorialz = '';
            }
//            dd(Carbon::parse($memorialtypecheck->created_at)->diffInHours(Carbon::parse(Carbon::now())) >= 24);
        }else {
            $memorialz = '';
        }

        $memorials = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(4)->get();
        return view('tribute.landing')
            ->with('memorials', $memorials)
            ->with('memorial', $memorial)
            ->with('count', $count)
            ->with('tc', $memorialz);
    }

    public function search(){
        $search = request()->query('query');
        if($search) {
            $memorial = Memorial::query()
                ->where('active', true)
                ->whereLike(['first_name', 'last_name'], $search)->get();
        }

        return view('tribute.search')
            ->with('memorial', $memorial)
            ->with('memorials', Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get());
    }

    public function pricing(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.pricing')
            ->with('memorials', $mem);
    }

    public function policy(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.privacy')
            ->with('memorials', $mem);
    }

    public function about(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.about')
            ->with('memorials', $mem);
    }

    public function terms(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.terms')
            ->with('memorials', $mem);
    }

    public function contact(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.contact')
            ->with('memorials', $mem);
    }

    public function howitworks(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.howitworks')->with('memorials', $mem);
    }

    public function faq(){
        $mem = Memorial::orderBy('created_at', 'desc')->where('active', true)->take(3)->get();
        return view('tribute.faq')->with('memorials', $mem);
    }




}
