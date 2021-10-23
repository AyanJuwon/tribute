<?php

namespace App\Http\Controllers;

use App\Life;
use Illuminate\Http\Request;

class LivesController extends Controller
{
    public function store(Request $request, $slug){
        $request->validate([
            'life' => 'required',
        ]);

        Life::create([
            'life' => $request->life,
            'user_id' => auth()->user()->id,
            'slug' => $slug
        ]);

        session()->flash('message', 'Life Updated Successfully');
        return redirect()->back();
    }
}