<?php

namespace App\Http\Controllers\Wall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Auth;
class ArticleDeleteController extends Controller
{
    public function delete($id) {
    	$user = Auth::user();
    	if($user->admin) {
	    	$article = Article::find($id);
    		$article->delete();
    	}
    	return redirect(url('/'));
    }
}
