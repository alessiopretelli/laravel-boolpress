@extends('layouts.app')

@section('title', 'categories')

@section('content')
 
<div class="categories">
@foreach ($categories as $c)
    <a href="{{route('category_selected', ['name' => $c['name']])}}"><li>{{$c['name']}}</li></a>
@endforeach
</div>

@endsection