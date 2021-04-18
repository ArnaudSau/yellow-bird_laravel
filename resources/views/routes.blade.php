<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Routes</title>
    <style>

        .container {
            background-color: white;
            text-align: left;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 5px 5px lightgrey;
            max-width: 90%;
            margin: auto;
        }

        .add{
            text-decoration: none;
            background-color: #A7CB23;
            padding: 10px;
            color: white;
            border-radius: 10px;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }
        h2{
            text-align: center;
        }

        th {
            border-bottom: solid 1px black;
        }


        th,
        td {
            text-align: left;
            padding: 8px;
            max-width: 70px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

    </style>
</head>

<body>
@include('header')

    <div class="container">
        <div class="header">
            <h2>Tous les Circuits</h2>
            <a class="add" href="/add-route">Ajouter un circuit</a>
        </div>
        @if(Session::has('route_deleted'))
            <script>alert("le lieu a bien été supprimé")</script>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>PathImage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($routes as $route)
                <tr>
                    <td>{{$route->id}}</td>
                    <td>{{$route->name}}</td>
                    <td>{{$route->description}}</td>
                    <td><img src="{{asset('imagesRoute')}}/{{$route->pathImage}}" style="max-width: 100px;" alt="img not found"></td>
                    <td> 
                        <a href="/route/<?php echo $route->id; ?>">Details</a> 
                        <a href="/edit-route/<?php echo $route->id; ?>">Edit</a>
                        <a href="/location-route/<?php echo $route->id; ?>">Edit locations</a>
                        <a href="/delete-route/<?php echo $route->id; ?>">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>