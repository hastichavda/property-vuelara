<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="cont">
    <div class="container">
        <create-property :propertydata="{{ $property }}"/> 
    </div>
</div>
    
@endsection
<style>
.cont{
   margin-left: 5%;
}
</style>