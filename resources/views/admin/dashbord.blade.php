<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
    <div class="cont">
        <div class="container">  
            <div class="card mb-5">
                <h1>Welcome to Dashboard</h1>
            </div> 
            <div class="row">
                <div class="col-sm-3 pr-1">
                    <div class="card card2">
                        <div class="card2">
                            <i class="ml-2 mt-2 fa fa-eye icon1"></i><hr> Page views
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pr-1">
                    <div class="card">
                        <div class="card3">
                            <i class="ml-2 mt-2 fa fa-comment icon1"></i><hr>Mails
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pr-1">
                    <div class="card">
                        <div class="card4">
                            <i class="ml-2 mt-2 fa fa-shopping-cart icon1"></i><hr>Product sales
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pr-1">
                    <div class="card">
                        <div class="card5">
                            <i class="ml-2 mt-2 fa fa-users icon1"></i><hr>User registered
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection

<style>
.cont
{
    margin-left: 5%;
}
.card1{
    width:100%;
    height: 6%;
}
.icon1{
    border-radius: 50%;
    color:white;
    padding: 10%;
    font-size: 30px;
    background: rgba(255, 255, 200, 0.15);
}
.card2{
    background-color : #5cb85c;
    width: 18rem; 
    height: 10rem;
    color: white;
    font-size: 23px;
}
.card3{
    background-color : #f0ad4e;
    width: 18rem; 
    height: 10rem;
    color: white;
    font-size: 23px;
}
.card4{
    background-color : #d9534f;
    width: 18rem; 
    height: 10rem;
    color: white;
    font-size: 23px;
}
.card5{
    background-color : #337ab7;
    width: 18rem; 
    height: 10rem;
    color: white;
    font-size: 23px;
}
.dash-cards
{
    background: white;
}

</style>