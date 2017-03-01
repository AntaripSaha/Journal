<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleCommentRequest;
use Auth;
use App\Comment;
use App\Article;

class CommentController extends Controller
{
    public function add(ArticleCommentRequest $request, $id) {
        $data = $request->all();
    	$comment = new Comment(['comment'=>$data['comment'], 'article_id'=>$id]);
    	$user = Auth::user();
    	$user->comments()->save($comment);
    	return redirect(route('articles.show', $id));
    }

    public function destroy($articleId, $commentId) {
        $user = Auth::user();
        if($user->admin) Comment::destroy($commentId);
        return redirect(route('articles.show', $articleId));
    }
}
