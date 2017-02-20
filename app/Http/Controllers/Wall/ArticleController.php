<?php

namespace App\Http\Controllers\Wall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class ArticleController extends Controller
{
    //
    public function show($id) {

    	$article = Article::find($id);

    	return view('article', ['article' => $article]);
    }

    public function like($id) {
    	$article = Article::find($id);
		$article->rating = $article->rating + 1;
		$article->save();
		return redirect(url('/articles/'.$id));
    }

    public function dislike($id) {
    	$article = Article::find($id);
		$article->rating = $article->rating - 1;
		$article->save();
		return redirect(url('/articles/'.$id));
    }


}
