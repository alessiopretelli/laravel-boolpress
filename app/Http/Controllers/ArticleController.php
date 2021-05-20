<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
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
            'category_id' => 'required',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stuff = [
            'articles' => Article::all(),
            'name' => 'all the news'
        ];
        // metodo spartano per reperire nome, il nome viene inserito nell'array names alla posizione corrispondente dell'id
        // $names = [];
        // foreach ($articles as $a) {
        //     $id = $a['user_id'];
        //     $names[$id] = User::find($id)['name'];
        // }

        // @dd($names);
         
        return view('news', $stuff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            $categories = Category::all();
            return view('addarticle', compact('categories'));
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
            $data['user_id'] = Auth::user()->id;
            $data['category_id'] = Category::where('name', $data['category_id'])->first()['id'];
            // @dd($data);
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
    public function show($title)
    {
        // @dd($title);
        $article = Article::where('title', $title)->first();

        // @dd($article);

        return view('details', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {

        if (Auth::check()) {
            $categories = Category::all();
            $article_to_update = Article::where('title', $title)->first();
            // @dd($article_to_update);

            return view('editarticle', compact('article_to_update', 'categories'));
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
            $data['category_id'] = Category::where('name', $data['category_id'])->first()['id'];
            // @dd($data);
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