<?php

namespace App\Http\Controllers;

use App\Stories;
use App\Tribute;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function addAdmin(){
        return view('admin.createAdmin');
    }

    public function allAdmin(){
        $admin = User::where('role', 'admin')->get();
        return view('admin.admin')
            ->with('admins', $admin);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'role' => 'admin',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        session()->flash('message', 'Admin created successfully');
        return redirect(route('allAdmin'));
    }

    public function destroy($id){

        $user = User::findOrFail($id);

        $tribute = Tribute::where('user_id', $id);

        $stories = Stories::where('user_id', $id);

        $activitylog = Activity::where('causer_id', $id);

        $activitylog->delete();

        $stories->delete();

        $tribute->delete();

        $user->delete();

        session()->flash('message','Admin deleted successfully');

        return redirect()->back();

    }
}
