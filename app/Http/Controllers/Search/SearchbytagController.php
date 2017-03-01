<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class SearchbytagController extends Controller
{
    public function result($tag) {
    	$tags = explode(",", $tag);
    	for($i=0; $i<sizeof($tags); $i++) $tags[$i] = "#".$tags[$i];	
    	$articles = Article::all();
    	foreach ($articles as $article) {
    		$articleTags = explode(" ", $article->tags);
    		foreach ($tags as $data) {
    			if(in_array($data, $articleTags)) {
    				$output[] = $article;
    				break;
    			}
    		}
    	}
    	if(empty($output)) $output = [];
    	return view('search.index', ['articles' => $output]);
    }
}
