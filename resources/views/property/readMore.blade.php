<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
<style>
.prop-content {
    background: whitesmoke;
    border-radius: 10px 10px;
    border: 1px solid grey;   
}
    .button1
    {
        background: #e81c28;
        color: white;
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
    @foreach ($properties as $property)
        <div class="text-center mb-3 mt-3">
            <div class="row">
                <div class="col">
                    <img src="{{ URL::asset($property->image) }}" style="width: 50%;">
                </div>
            </div>  
        </div>
        <div class="prop-content container">
            <div class="container">
                <h1> {{ $property->title }} </h1>
                <br>
                <p> {{ $property->description }} </p>
                <br>
                <a href="{{ action('PropertyController@readMore',$property->id)}}" 
                    class="btn button2">
                    <strong>$ {{ $property->price }}</strong>
                </a>
                <a href="/connect" 
                    class="btn button1">Connect Now</a>
            </div>
            <br>
        </div>
    @endforeach
</body>
</html>


