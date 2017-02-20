<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchbytagController extends Controller
{
    //

    public function result($tag) {
    	dd($tag);
    	return view('search');
    }
}
