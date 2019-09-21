<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="cont">
        <div class="container form">
            <div class="container-fluid">
            <edit-property  :edit-data ="{{ $properties }}"></edit-property>
            </div>
        </div>
    </div>
@endsection

<style>
.form
{
    width:50%;
}
.cont{
    margin-left: 5%;
}
</style>