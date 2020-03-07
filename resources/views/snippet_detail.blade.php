@extends('master')

@section('title', 'Detail')
@section('headline', '')
@section('content')

    <snippet_detail :snippet_id="'{{$snippet_id}}'"></snippet_detail>

@endsection

