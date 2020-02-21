@extends('master')

@section('title', 'Kontext anlegen')
@section('headline', 'Kontext anlegen')
@section('content')
    <span>Remember, Remember, the 5th of november</span>

    <form action="/addContext" method="post">
        <input type="text" name="name" placeholder="Name">
        {{ csrf_field() }}
        <button type="submit">Abschicken</button>
    </form>

@endsection
