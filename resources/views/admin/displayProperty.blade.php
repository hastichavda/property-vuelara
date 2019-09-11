<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('layouts.app')
@section('content')

    <div class="container">
       <display-property :display-data="{{ $properties }}"></display-property>
    </div>

@endsection