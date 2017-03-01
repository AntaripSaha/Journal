<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\Article\ArticleAddRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use Auth;
use App\Comment;
use App\Subcomment;

class ArticleController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only'=>['create', 'edit', 'update', 'destroy', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('id')->get();
        return view('articles.index', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleAddRequest $request)
    {
        $data = $request->all();
        preg_match_all("/(#\w+)/u", $data['tags'], $tags);
        $tags = implode(" ", $tags[0]);
        $article = new Article([
            'title' => $data['title'],
            'introduction' => $data['introduction'],
            'tags' => $tags,
            'article' => $data['article'],
            'rating' => 0
        ]);
        $user = Auth::user();
        $user->articles()->save($article);
        return redirect(route('articles.show', $article->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $comments = Comment::latest('id')->where('article_id', '=', $id)->get();
        $subcomments = Subcomment::where('article_id', '=', $id)->get();
        $count = Comment::where('article_id', '=', $id)->count();
        return view('articles.show', ['article' => $article, 'comments'=>$comments, 'subcomments'=>$subcomments, 'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $user = Auth::user();
        $article = Article::find($id);
        $articleAuthor = $article->user;
        if($user->admin || $user->id == $articleAuthor->id) {
            $data = $request->all();
            preg_match_all("/(#\w+)/u", $data['tags'], $tags);
            $tags = implode(" ", $tags[0]);
            $data['tags'] = $tags;
            $article->update($data);
            $article->save();
        }
        return redirect(route('articles.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $articleAuthor = Article::find($id)->user;
        if($user->admin || $user->id == $articleAuthor->id) Article::destroy($id);
        return redirect(route('articles.index'));
    }
}
