<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #E4DA4F;
        }

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            align-items: center;
            padding-top: 50px;
        }

        input[type=text],
        input[type=number],
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        form {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            max-width: 1000px;
            box-shadow: 0px 5px 5px lightgrey;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        @if(Session::has('location_updated'))
            <script>alert('Le lieu a bien été mis à jours')</script>
        @endif
        <form method="POST" action="{{route('location.update')}}" enctype="multipart/form-data">
            @csrf
            <a href="/locations">retour</a>
            <h2>Editer un lieu</h2>
            <input type="hidden" name="id" value="{{$location->id}}">
            <div class="champ">
                <label for="name">Nom du lieu</label>
                <input required type="text" name="name" placeholder="nom" value="{{$location->name}}">
            </div>
            <div class="champ">
                <label for="description">Description du lieu</label>
                <textarea required name="description" id="" cols="30" rows="10">{{$location->description}}</textarea>
            </div>
            <div class="champ">
                <label for="anecdote">Anecdote du lieu</label>
                <textarea required name="anecdote" id="" cols="30" rows="3">{{$location->anecdote}}</textarea>
            </div>
            <div class="champ">
                <label for="longitude">Longitude</label>
                <input required type="number" step="any" name="longitude" value="{{$location->longitude}}" placeholder="34.123457">
            </div>
            <div class="champ">
                <label for="latitude">Latitude</label>
                <input required type="number" step="any" name="latitude" value="{{$location->latitude}}" placeholder="2.014584">
            </div>
            <div class="champ">
                <label for="pathImage">Sélectionner une Image</label>
                <input accept="image/*" type="file" name="pathImage"> <br>
                <td><img src="{{asset('images')}}/{{$location->pathImage}}" style="max-width: 200px;" alt="img not found"></td>
            </div>
            <button type="submit">Modifier ce lieu</button>
        </form>
    </div>
</body>

</html>