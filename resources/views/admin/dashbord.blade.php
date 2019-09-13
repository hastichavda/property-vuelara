<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="sidebar mr-5">
            <ul class="menu">
                <li class="menuitems">
                    <a href="/dashbord" class="items">
                        <i class="fa fa-tachometer icon"></i>Dashbord
                    </a>
                </li>
                <li class="menuitems">
                    <a href="/property/create" class="items">
                        <i class="fa fa-plus-square icon"></i>Create Property
                    </a>
                </li>
                <li class="menuitems">
                    <a href="/propertytype/create" class="items">
                        <i class="fa fa-plus-square icon"></i>Create PropertyType
                    </a>
                </li>
                <li class="menuitems">
                    <a href="/property" class="items">
                        <i class="fa fa-home icon"></i>Property
                    </a>
                </li>
                <li class="menuitems">
                    <a href="#" class="items">
                        <i class="fa fa-users icon"></i>Profile
                    </a>
                </li>
            </ul>
        </div>   
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h1>Dashboard </h1>
                </div>
            </div>  
        </div>
    </div>
@endsection

<style>
    .main{
        overflow-x: hidden;
        display: flex;
        height: 100%;
    }
    .sidebar
    {
        background: #3F7FBF;
        padding-top: 2%;
        width: 18%;
    }
    .menu
    {
        list-style: none;
    }
    .menuitems{
        padding: 5% 0 5% 1%;
    }
    .items
    {
        color: whitesmoke;
        font-size: 15px;
    }
    .items:hover 
    {
        color: antiquewhite;
    }
    .icon
    {
        padding-right: 20px;
        font-size: 20px;
    }
</style>