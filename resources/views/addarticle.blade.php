@extends('layouts.app')

@section('title', 'add_article')

@section('content')

@if ($errors->any())
{{-- @dd($errors) --}}
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

<form action="{{route('articles.store')}}" method="post">
    @csrf
    @method('POST')

    <label for="title">title</label>
    <input type="text" name="title">

    <label for="content">intro</label>
    <input type="text" name="intro">

    <label for="content">body</label>
    <input type="text" name="body">

    <label for="content">category_id</label>
    <select name="category_id">
        @foreach ($categories as $c)
            <option>{{$c['name']}}</option>
        @endforeach
    </select>

    <p>Seleziona i tag:</p>
    @foreach ($tags as $tag)
        <input name="tags[]"  type="checkbox" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked=checked' : ''}}>
        <label>{{$tag->name}}</label>
    @endforeach

    <input type="submit" value="send">
    </form>

@endsection