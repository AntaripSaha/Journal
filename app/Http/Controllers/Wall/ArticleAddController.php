<?php

namespace App\Http\Controllers\Wall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Auth;
class ArticleAddController extends Controller
{
    //

    public function show() {
    	return view('add');
    }

    public function add(Request $request) {
    	//dump($request);
    	$this->validate($request, [
            'title' => 'required|max:128',
            'introduction' => 'required|max:512',
            'tags' => 'max:256',
            'article' => 'required|max:2048'
        ]);


    	$data = $request->all();

        //dump($data['tags']);
        preg_match_all("/(#\w+)/u", $data['tags'], $tags);
        
        //dd($tags);    
        
        $tags = implode(" ", $tags[0]);

        //dd($tags); 	



        $userid = Auth::user()->id;
    	$article = Article::create([
            'title' => $data['title'],
            'introduction' => $data['introduction'],
            'tags' => $tags,
            'article' => $data['article'],
            'rating' => 0,
            'user_id' => $userid
        ]);
    	return redirect(url('articles/'.$article->id));
    }
}
