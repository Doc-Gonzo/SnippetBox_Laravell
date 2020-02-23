@extends('master')

@section('title', 'Detail')
@section('headline', 'Detail')
@section('content')

    <snippet_detail :snippet_id="'{{$snippet_id}}'"></snippet_detail>

@endsection

