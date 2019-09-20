<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <a href="/profile" class="items">
                        <i class="fa fa-users icon"></i>Profile
                    </a>
                </li>
                <li class="menuitems">
                    <a href="/inquery" class="items">
                        <i class="fa fa-info-circle icon"></i>InqeryForm Data
                    </a>
                </li>
            </ul>
        </div>   
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
.main{
    overflow-x: hidden;
    display: flex;
    height: 100%;
}
.sidebar
{
    background: #3F7FBF;
    padding-top: 2%;
    width: 19%;
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
.table{
    width:10%;
}
</style>