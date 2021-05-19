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

    <label for="content">type</label>
    <input type="text" name="type">

    <input type="submit" value="send">
    </form>

@endsection