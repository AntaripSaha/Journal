<?php

namespace App\Http\Controllers\Wall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Like;
use Auth;
class ArticleController extends Controller
{
    //
    public function show($id) {

    	$article = Article::find($id);

    	return view('article', ['article' => $article]);
    }

    public function like($articleId) {
        $userId = Auth::user()->id;

        Like::create([
            'user_id' => $userId,
            'article_id' => $articleId,
            'status' => true
            ]);

    	$article = Article::find($articleId);
		$article->rating = $article->rating + 1;
		$article->save();
		return redirect(url('/articles/'.$articleId));
    }

    public function dislike($articleId) {
        $userId = Auth::user()->id;
        
        Like::create([
            'user_id' => $userId,
            'article_id' => $articleId,
            'status' => false
            ]);

    	$article = Article::find($articleId);
		$article->rating = $article->rating - 1;
		$article->save();
		return redirect(url('/articles/'.$articleId));
    }


}
