<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Like;
use App\Article;

class LikeController extends Controller
{
    public function like($id, $status) {
    	foreach (Auth::user()->likes as $like) {
    		if($like->article_id == $id) return redirect(route('articles.show',$id));
    	}
    	$like = new Like(['status' => $status]);
        $like->article_id = $id;
        $user = Auth::user();
        $user->likes()->save($like);
        if($status) Article::find($like->article_id)->increment('rating', 1);
        else Article::find($like->article_id)->decrement('rating', 1);
        return redirect(route('articles.show',$id));
    }
}
