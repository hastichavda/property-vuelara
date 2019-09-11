@extends('layouts.app')
@section('content')

    <div class="container">
        <property-type :typedata="{{ $type }}"/>
    </div>

@endsection