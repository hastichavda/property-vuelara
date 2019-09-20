<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" sintegrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow-x: hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .header1{
                height: 70vh;
                min-height: 500px;
                width: 100%;
            }
            .box{
                background: skyblue;
                color:  black;
                font-size: 18px;
                font-weight: bold;
                width:30%;
                margin-left:  auto;
                margin-right: auto;
                -webkit-box-shadow: -1px 1px 24px 50px rgba(207,201,207,1);
                -moz-box-shadow: -1px 1px 24px 7px rgba(207,201,207,1);
                box-shadow: -1px 1px 24px 7px rgba(207,201,207,1);
            }
        </style>
    </head>
    <body>      
        @include('header')  
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner header1" data-interval="1">
                <div class="carousel-item active">
                    <img class="d-block" src="{{url('/images/4.jpg')}}">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{url('/images/caros1.jpg')}}" width="100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="{{url('/images/caros2.jpg')}}" width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icon1" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon icon1" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="box mt-1">
            <h4 class="text-center">Property Type</h4>
            <hr>   
            <ul>
                @foreach ($types as $type)
                    <li class="list-group">
                        <a href="{{ action('PropertyController@filterProperty',$type->id ) }}">
                            {{$type->name}}
                        </a>
                    </li>
                @endforeach
            </ul> 
        </div>

        <div class="container">
            <div class="row">
            @foreach ($properties as $property)
                <div class="col-sm-4 py-2">
                    <div class="card card-body h-100">
                        <img src="{{ URL::asset($property->image) }}"  alt="" width="100%" height="80%" >    
                        <a href="{{ action('PropertyController@readMore',$property->id)}}" 
                            class="btn btn-info">
                            <strong>$ {{ $property->price }}</strong>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>      

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    </body>
</html>
