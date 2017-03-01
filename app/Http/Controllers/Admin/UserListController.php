<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserListController extends Controller
{
    //

    public function show() {
    	$userlist = User::all();
    	return view('admin.userlist', ['userlist'=>$userlist]);
    }
}
