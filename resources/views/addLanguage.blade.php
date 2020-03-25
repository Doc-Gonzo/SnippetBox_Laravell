@extends('master')

@section('title', 'Sprache anlegen')
@section('headline', 'Sprache anlegen')
@section('content')



    <span>Remember, Remember, the 5th of november</span>

    <form action="/addLanguageSingle" method="post">
        <input type="text" name="name" placeholder="Name">
        <select name="context_id">
            <?php $contexts = \App\Context::all(); ?>
            @foreach($contexts as $context)
                <option value="{{$context->id}}"> {{$context->name}}</option>
            @endforeach
        </select>
        {{ csrf_field() }}
        <button type="submit">Abschicken</button>
    </form>

@endsection
