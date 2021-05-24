<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();

        return response()->json(
            [
                'success' => true,
                'results' => $articles
            ]
        );
    }
}
