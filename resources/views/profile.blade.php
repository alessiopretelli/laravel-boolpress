@extends('layouts.app')

@section('content')
    <h1>dati utente</h1>
    <ul>
        <li>{{Auth::user()->name}}</li>
        <li>{{Auth::user()->email}}</li>
        @if (Auth::user()->api_token)
        <li>Il tuo API: {{Auth::user()->api_token}}</li>
        @else 
            <form action="{{route('generate_token')}}" method="post">
                @csrf
                <button type="submit">Genera API Token</button>
            </form>
        @endif
    </ul>
@endsection