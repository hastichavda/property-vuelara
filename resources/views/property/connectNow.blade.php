
@extends('layouts.app')

@section('content')    
    <div class="container">
        <connect-now :inqueryData="{{ $inqueries }}" :property-id="{{ $property_id }}" />
    </div>
@endsection


    