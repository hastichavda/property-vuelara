<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="cont">
        <div class="container"> 
            <table class="table table-striped ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Connact No.</th>
                    <th scope="col">Message</th>
                    <th scope="col">Delete</th>                
                </tr>
            </thead>
            <tbody>
                @foreach ($inqueries as $inquery)
                <tr>
                    <th scope="row">{{ $inquery->fname }} </th>
                    <td>{{ $inquery->lname }} </td>
                    <td>{{ $inquery->email }}</td>
                    <td>{{ $inquery->contactno }}</td>
                    <td>{{ $inquery->message }}</td>
                    <td><a href = 'inquery/{{ $inquery->id }}' class="fa fa-trash fa-2x text-danger"></a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
.cont{
    margin-left: 5%;
}
</style>