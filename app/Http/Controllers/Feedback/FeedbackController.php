<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackAddRequest;
use App\Feedback;
use Auth;

class FeedbackController extends Controller
{
	public function index() {
		$feedbacks = Feedback::latest('id')->get();
        return view('feedback.index', ['feedbacks'=>$feedbacks]);
	}

	public function store(FeedbackAddRequest $request) {
        Feedback::create($request->all());
        return redirect(route('feedback.index'));
	}

	public function destroy($id) {
		if(Auth::user()->admin) Feedback::destroy($id);
		return redirect(route('feedback.index'));
	}
}
