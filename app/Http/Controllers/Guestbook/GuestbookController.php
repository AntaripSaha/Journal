<?php

namespace App\Http\Controllers\Guestbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedbacks;

class GuestbookController extends Controller
{
    //
    public function show() {
    	//$feedbacks = Feedbacks::all();
    	$feedbacks = Feedbacks::latest('id')->get();
    	return view('guestbook', ['feedbacks'=>$feedbacks]);
    }

    public function add(Request $request) {
    	//dump($request);
    	$this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|max:320',
            'feedback' => 'required|max:1024'
        ]);

    	$data = $request->all();
    	Feedbacks::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['feedback']
        ]);
    	//$feedbacks = Feedbacks::all();
    	$feedbacks = Feedbacks::latest('id')->get();
    	return view('guestbook', ['feedbacks'=>$feedbacks]);
    }
}
