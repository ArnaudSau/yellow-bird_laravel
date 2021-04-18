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

        /* Reset Select */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #f5f5f5;
            background-image: none;
        }

        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }

        /* Custom Select */
        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background: #f5f5f5;
            overflow: hidden;
            border-radius: .25em;
        }

        select {
            flex: 1;
            padding: 0 .5em;
            color: #333;
            cursor: pointer;
        }

        /* Arrow */
        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #ddd;
            cursor: pointer;
            pointer-events: none;
            -webkit-transition: .25s all ease;
            -o-transition: .25s all ease;
            transition: .25s all ease;
        }

        /* Transition */
        .select:hover::after {
            color: #D4C825;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="container">
        @if(Session::has('location_route_updated'))
        <script>
            alert('Le chemin a été mis à jours')
        </script>
        @endif
        <form method="POST" action="{{route('location-route.update')}}" enctype="multipart/form-data">
            @csrf
            <a href="/routes">retour</a>
            <h2>Editer le chemin</h2>
            <input type="hidden" name="idRoute" value="{{$route->id}}">
            <?php for ($i = 1; $i <= 5; $i++) {
            ?>
                <div class="select">
                    <select name="lieu<?= $i ?>" id="<?= $i ?>">
                        <option value="0">Ajouter un lieu</option>
                        @foreach($locations as $location)
                        <option <?php
                                foreach ($route_locations as $route_location) {
                                    if ($location->id == $route_location->location_id && $i == $route_location->orderInRoute) {
                                        echo "selected";
                                    }
                                }
                                ?> 
                        value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div> <br>
            <?php  } ?>
            <button type="submit">Modifier le chemin</button>
        </form>
    </div>
</body>

</html>