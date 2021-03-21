<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Locations</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #E4DA4F;
        }

        .container {
            background-color: white;
            text-align: left;
            padding: 20px;
            border-radius: 20px;
        }

        .add{
            text-decoration: none;
            background-color: lightseagreen;
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

        thead {

            background-color: #FFF67F;
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

        th {
            background-color: #617C00;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Tous les lieux</h2>
            <a class="add" href="/add-location">Ajouter un lieu</a>
        </div>
        @if(Session::has('location_deleted'))
            <script>alert("le lieu a bien été supprimé")</script>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Anecdote</th>
                    <th>PathImage</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                    <td>{{$location->id}}</td>
                    <td>{{$location->name}}</td>
                    <td>{{$location->description}}</td>
                    <td>{{$location->anecdote}}</td>
                    <td>{{$location->pathImage}}</td>
                    <td>{{$location->longitude}}</td>
                    <td>{{$location->latitude}}</td>
                    <td> 
                        <a href="/location/<?php echo $location->id; ?>">Details</a> 
                        <a href="/edit-location/<?php echo $location->id; ?>">Edit</a>
                        <a href="/delete-location/<?php echo $location->id; ?>">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>