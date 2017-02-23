<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class SearchbytagController extends Controller
{
    //

    public function result($tag) {
    	
    	//dd($tag);
    	$tags = explode(",", $tag);
    	for($i=0; $i<sizeof($tags); $i++) $tags[$i] = "#".$tags[$i];	
    	$articles = Article::all();
    	foreach ($articles as $article) {
    		$articleTags = explode(" ", $article->tags);
    		//dump($articleTags);
    		foreach ($tags as $data) {
    			//dump($data);
    			//dump(in_array($data, $articleTags));
    			if(in_array($data, $articleTags)) {
    				$output[] = $article;
    				break;
    			}
    		}
    	}
    	//dump($output);
    	//dd($tags);
    	if(empty($output)) $output = [];
    	return view('index', ['articles' => $output]);
    }
}
