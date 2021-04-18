<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add route</title>
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
        @if(Session::has('route_created'))
            <script>alert('Le circuit a bien été créé')</script>
        @endif
        <form method="POST" action="{{route('route.create')}}" enctype="multipart/form-data">
            @csrf
            <a href="/routes">retour</a>
            <h2>Ajouter un circuit</h2>
            <div class="champ">
                <label for="name">Nom du circuit</label>
                <input required type="text" name="name" placeholder="nom">
            </div>
            <div class="champ">
                <label for="description">Description du circuit</label>
                <textarea required name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="champ">
                <label for="pathImage">Sélectionner une Image</label>
                <input required accept="image/*" type="file" name="pathImage" id="pathImage"> <br>
                <img id="previewImg" alt="img route" style="max-width: 150px; margin-top:20px;display:none;">
            </div>
            <button type="submit">Ajouter ce circuit</button>
        </form>
    </div>

    <script>
        document.getElementById('pathImage').addEventListener('change',()=>{
            output = document.getElementById('previewImg');
            document.getElementById('previewImg').src = URL.createObjectURL(event.target.files[0]);
            document.getElementById('previewImg').style.display = "block";
            document.getElementById('previewImg').onload = () =>{
                URL.revokeObjectURL(output.src) // free memory
            }
        })
    </script>
</body>

</html>