<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="cont">
        <div class="container">
            <property-type :typedata="{{ $type }}"/>
        </div>
    </div>
@endsection
<style>
    .cont
    {
        margin-left: 5%;
    }
</style>