@extends('layouts.app')

@section('title', ($name) ? $name : 'News')

@section('content')

    @if ($name)
    <h1>{{$name}}</h1> 
    @else 
    <h1>All the news</h1>
    @endif

    @guest
    <p>Read the articles by clicking the title</p>
    @else
    <a href="{{route('articles.create')}}">Add news</a>  
    @endguest
    
    @if (session('status'))
    <h2>Article deleted!</h2>
    @endif

    @foreach ($articles as $article)
        <a href="{{route('articles.show', ['article' => $article->title])}}">
            <div class="news">
                <div class="category">
                    <p>{{$article['type']}}</p>
                </div>
                <h1>{{$article['title']}}</h1>
                <h3>{{$article['intro']}}</h3>
                <div class="info_news">
                    <p>Date: {{$article['created_at']}}</p>
                    @if ($article->user->name)
                    <p>Author: {{$article->user->name}}</p>
                    @endif
                </div>
                @guest
                @else
                    @if ($article->user->name == Auth::user()->name) 
                        <div class="settings">
                            <a href="{{route('articles.edit', ['article' => $article->title])}}">edit</a>
                            <form class='form_delete' action="{{ route('articles.destroy', ['article' => $article['id']]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <button class="delete" type='submit'>delete</button>
                            </form>       
                        </div>
                    @endif
                @endguest
            </div>
        </a>
    @endforeach

@endsection