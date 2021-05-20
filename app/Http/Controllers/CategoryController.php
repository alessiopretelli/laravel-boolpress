<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function show_articles($name) {
        // @dd($id);
        $id = Category::where('name', $name)->first()['id'];
        $stuff = [
            'articles' => Article::where('category_id', $id)->get(),
            'name' => $name
        ];    
        // @dd($articles);
        return view('news', $stuff);
    }

}
