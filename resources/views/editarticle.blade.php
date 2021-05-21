@extends('layouts.app')

@section('title', 'add_article')

@section('content')

<form action="{{route('articles.update', ['article' => $article_to_update['id']])}}" method="post">
    @csrf
    @method('PUT')

    <label for="title">title</label>
    <input type="text" name="title" value="{{$article_to_update->title}}">

    <label for="content">intro</label>
    <input type="text" name="intro"  value="{{$article_to_update->intro}}">

    <label for="content">body</label>
    <input type="text" name="body"  value="{{$article_to_update->body}}">

    <label for="content">category_id</label>
    <select name="category_id">
        @foreach ($categories as $c)
            <option {{($c['id'] == $article_to_update->category_id) ? "selected" : null}}>{{$c['name']}}</option>
        @endforeach
    </select>

    <p>Seleziona i tag:</p>
    @foreach ($tags as $tag)
        <input name="tags[]"  type="checkbox" value="{{$tag->id}}" {{$article_to_update->tags->contains($tag) ? 'checked=checked' : ''}}>
        <label>{{$tag->name}}</label>
    @endforeach

    <input type="submit" value="send">
    </form>

@endsection