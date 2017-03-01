<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleSubcommentRequest;
use Auth;
use App\Subcomment;

class SubcommentController extends Controller
{
    public function add(ArticleSubcommentRequest $request, $articleId, $commentId) {
    	$data = $request->all();
    	$comment = new Subcomment(['comment'=>$data['comment'], 'article_id' => $articleId, 'comment_id' => $commentId]);
    	$user = Auth::user();
    	$user->subcomments()->save($comment);
    	return redirect(route('articles.show', $articleId));
    }

    public function destroy($articleId, $commentId) {
        $user = Auth::user();
        if($user->admin) Subcomment::destroy($commentId);
        return redirect(route('articles.show', $articleId));
    }  
}
