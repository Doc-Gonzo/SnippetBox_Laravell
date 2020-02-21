@extends('master')

@section('title', 'Sammlung anlegen')
@section('headline', 'Sammlung anlegen')
@section('content')

    <span>Remember, Remember, the 5th of november</span>

    <?php
        $user = auth()->user();
    ?>
    <form action="/addSammlung" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        {{ csrf_field() }}
        <button type="submit">Abschicken</button>
    </form>

@endsection
