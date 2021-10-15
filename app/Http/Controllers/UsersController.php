<?php

namespace App\Http\Controllers;

use App\ActiviesLog;
use App\Mail\BannedAccount;
use App\Mail\RegistrationMail;
use App\Stories;
use App\Tribute;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Activitylog\Models\Activity;

class UsersController extends Controller
{
    public function destroy($id){
        $user = User::findOrFail($id);

        $user->update([
            'isBan' => true,
        ]);
//
//        $tribute = Tribute::where('user_id', $id);
//
//        $stories = Stories::where('user_id', $id);
//
//        $activitylog = ActiviesLog::where('causer_id', $id);
//
//        $activitylog->delete();
//
//        $stories->delete();
//
//        $tribute->delete();
//
//        $user->delete();
        Mail::to($user)->send(new BannedAccount($user));

        session()->flash('message','User deactivated successfully');

        return redirect()->back();

    }

    public function activate($id){
        $user = User::findOrFail($id);

        $user->update([
            'isBan' => false,
        ]);

        session()->flash('message','User Activated successfully');

        return redirect()->back();
    }

    public function show($id){
        $user = User::where('id',$id)->where('role', 'user')->firstOrFail();
        return view('admin.show')->with('user', $user);
    }
}
