@extends('layouts.app')

@section('title', 'details')

@section('content')
    
    <div class="details">
        <h1>{{$article['title']}}</h1>
        <h3>{{$article['intro']}}</h3>
        <div class="body_news">
            <p>{{$article['body']}}</p>
        </div>
        <div class="info_news">
            <p>Date: {{$article['created_at']}}</p>
        </div>
    </div>

@endsection