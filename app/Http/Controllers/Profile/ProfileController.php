<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileEditRequest;
use Auth;
use App\User;

class ProfileController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
    	return view('profile.index', ['user'=>$user]);
    }

    public function edit(ProfileEditRequest $request) {
    	$user = Auth::user();
        $data = $request->all();
    	$user->name = $data['name'];
    	$user->surname = $data['surname'];
    	$user->birthdate = $data['birthdate'];
    	$changed = $user->save();
    	return view('profile.index', ['user'=>$user, 'changed'=>$changed]);
    }
}
