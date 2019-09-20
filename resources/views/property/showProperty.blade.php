<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .sad 
    {
        margin-left: auto;
        margin-right: auto;
    }
    .button2
    {
        background: #21c0a8;
        color: white;
    }
    </style>
</head>
<body>
    @include('/header')
    <div class="row mt-4">
        @if(count($properties)> 0)
        @foreach ($properties as $property)
            <div class="col">
                <div class="card h-100" style="width: 23rem;">
                    <div class="card-header" style="width: 23rem;">
                        <img class="card-img-top img-fluid" src="{{ URL::asset($property->image) }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $property->action }}</li>
                    </ul>
                    <div class="card-footer">
                        <a href="{{ action('PropertyController@readMore',$property->id)}}" 
                            class="btn button2">
                            <strong>$ {{ $property->price }}</strong>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="sad mt-3">
            <div class="card mb-3 text-center">
                <img src="{{url('/images/sad.png')}}" alt="">
                <div class="card-footer">
                    <h1>No Property Yet</h1>
                </div>
            </div>
        </div>
        @endif
    </div>
</body>
</html>
