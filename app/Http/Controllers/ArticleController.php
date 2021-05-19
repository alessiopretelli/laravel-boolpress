<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected function valida(Request $request) 
    {
        $request->validate([
            'title' => 'required|max:250',
            'intro' => 'required|max:250',
            'body' => 'required',
            'type' => 'required|max:50',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
         
        return view('news', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            return view('addarticle');
        } else {
            return $this->index();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();

            $this->valida($request);
    
            $new_article = new Article;
    
            $new_article->fill($data);
    
            $new_article->save();
    
            return redirect()->route('articles.index');
        } else {
            return $this->index();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('details', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::check()) {
            $article_to_update = Article::findOrFail($id);

            return view('editarticle', compact('article_to_update'));
        } else {
            return $this->index();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if (Auth::check()) {
            $data = $request->all();
            $article->update($data);
    
            return redirect()->route('articles.index');
        } else {
            return $this->index();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        if (Auth::check()) {
            $article->delete();
            return redirect()->route('articles.index')->with('status', 'Article deleted!');
        } else {
            return $this->index();
        }

    }
}