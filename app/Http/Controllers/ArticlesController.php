<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArticlesController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

	    return view( 'articles.index', compact('articles') );
    }

    public function indexUnPublished()
    {
        $articles = Article::latest('published_at')->scheduledToBePublished()->get();

	    return view( 'articles.index', compact('articles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view( 'articles.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
    	Auth::user()->articles()->create($request->all());
		$message = 'Your article has been created.';
	    flash( $message, 'success' );

	   return redirect()->route( 'articles.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	try{
		    $article = Article::findOrFail($id);
	    } catch(ModelNotFoundException $ex) {
		    $message = 'Could not find the article';
		    flash($message, 'danger')->important();

		    return redirect()->route( 'articles.index' );
	    }

	    return view( 'articles.show', compact( 'article' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $article = Article::findOrFail( $id );
	    return view( 'articles.edit', compact('article') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

	    $article->update( $request->all() );

	    $message = 'Article updated...';
	    flash($message);

	    return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRows = Article::findOrFail($id)->delete();

	    $message = 'Article deleted...';
	    flash( $message, 'warning' );

	    return redirect()->route('articles.index');
    }
}