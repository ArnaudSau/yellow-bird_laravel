<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit route</title>
    <style>

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            align-items: center;
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
@include('header')

    <div class="container">
        @if(Session::has('route_updated'))
            <script>alert('Le lieu a bien été mis à jours')</script>
        @endif
        <form method="POST" action="{{route('route.update')}}" enctype="multipart/form-data">
            @csrf
            <a href="/routes">retour</a>
            <h2>Editer un lieu</h2>
            <input type="hidden" name="id" value="{{$route->id}}">
            <div class="champ">
                <label for="name">Nom du lieu</label>
                <input required type="text" name="name" placeholder="nom" value="{{$route->name}}">
            </div>
            <div class="champ">
                <label for="description">Description du lieu</label>
                <textarea required name="description" id="" cols="30" rows="10">{{$route->description}}</textarea>
            </div>
            <div class="champ">
                <label for="pathImage">Sélectionner une Image</label>
                <input accept="image/*" type="file" name="pathImage"> <br>
                <td><img src="{{asset('imagesRoute')}}/{{$route->pathImage}}" style="max-width: 200px;" alt="img not found"></td>
            </div>
            <button type="submit">Modifier ce lieu</button>
        </form>
    </div>
</body>

</html>