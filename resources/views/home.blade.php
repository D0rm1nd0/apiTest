@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app" class="row flex-column">
        <get-token></get-token>
        <showdata v-bind:coins="{{$coins}}"></showdata>
    </div>
</div>
@endsection
