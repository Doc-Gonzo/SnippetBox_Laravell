@extends('master')

@section('title', 'Testvue')
@section('headline', 'Testvue')
@section('content')

    <testvvue></testvvue>

@endsection
<script>
    import Testvvue from "../js/components/testvvue";
    export default {
        components: {Testvvue}
    }
</script>
