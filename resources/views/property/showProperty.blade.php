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
    <div class="row">
       @if(count($properties)> 0)
       @foreach ($properties as $property)
        <div class="col">
            <div class="card mt-2">
                <img src="{{ URL::asset($property->image) }}"  style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $property->title }}
                    </h5>
                    <h4 class="card-title">
                        {{ $property->action }}
                    </h4>
                    <p class="card-text"> 
                        {{ $property->description }}
                    </p>
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
