<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    //
    public function show() {
    	$id = Auth::id();
    	$user = User::find($id);
    	return view('profile', ['user'=>$user]);
    }

    public function edit(Request $request) {
    	$this->validate($request, [
            'name' => 'required|max:64',
            'surname' => 'required|max:64',
            'birthdate' => 'required',
        ]);
    	$data = $request->all();
    	$id = Auth::id();
    	$user = User::find($id);
    	$user->name = $data['name'];
    	$user->surname = $data['surname'];
    	$user->birthdate = $data['birthdate'];
    	$user->save();
    	$changed = $user->save();
    	return view('profile', ['user'=>$user, 'changed'=>$changed]);
    }
}
