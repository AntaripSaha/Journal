<?php

namespace App\Http\Controllers\Wall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class WallController extends Controller
{
    //
    public function show() {
    	//$user = Auth::user();
    	//$data = $user->articles;
    	//echo $data[0]->article;
    	//dd($data);
    	//$user = User::find(1);
    	//dd($user->articles());

    	//$articles = Article::all();
    	$articles = Article::latest('id')->get();

    	return view('index', ['articles' => $articles]);
    }
}
