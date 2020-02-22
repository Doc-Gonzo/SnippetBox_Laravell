@extends('master')

@section('title', 'Snippet anlegen')
@section('headline', 'Snippet anlegen')
@section('content')



    <span>Remember, Remember, the 5th of november</span>


    <?php $user = auth()->user() ?>

    <form class="form-group" action="/addSnippet" method="post">
        <input type="text" name="name" placeholder="Name" class="snippet_name input-group mb-3">
        <textarea  name="desc" placeholder="Beschreibung" class="snippet_desc input-group mb-3"></textarea>
        <textarea  name="snippet_content" placeholder="Content" class="snippet_content input-group mb-3"></textarea>
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <!-- Language -->
        <label for="codingLanguage_id">Sprache:</label>
        <select name="codingLanguage_id">
            <?php $codingLanguages = \App\CodingLanguage::all(); ?>
            @foreach($codingLanguages as $codingLanguage)
                <option value="{{$codingLanguage->id}}"> {{$codingLanguage->name}}</option>
            @endforeach
        </select>
            <!-- Sammlung -->
        <label for="sammlung_id">Sammlung:</label>
        <select name="sammlung_id">
            <?php $sammlungs = \App\Sammlung::all(); ?>
            @foreach($sammlungs as $sammlung)
                <option value="{{$sammlung->id}}"> {{$sammlung->name}}</option>
            @endforeach
        </select>
        <!-- Public -->
            <label for="public">Public?</label>
        <select name="public">
            <option value="0">Nein</option>
            <option value="1">Ja</option>
        </select>
        {{ csrf_field() }}
        <button class="btn btn-dark ml-2" type="submit">Abschicken</button>
    </form>

@endsection
