<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
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
</head>
<body>
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
    </div>
</body>
</html>