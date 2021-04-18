<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route details</title>
    <style>

        .container{
            display: flex;
            justify-content: center;
        }

        .infos {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
        }

        h2{
            text-align: center;
        }
    </style>
</head>

<body>
@include('header')

    <div class="container">
        <div class="infos">
            <a href="/routes">retour</a>
            <h2>Détails sur le lieu</h2>
            <div class="details">
                <p>Nom :  <br><?php echo $route->name; ?></p>
                <p>Description :<br> <?php echo $route->description; ?></p>
                <p>PathImage :<br> <?php echo $route->pathImage; ?></p>
            </div>
        </div>
    </div>

</body>

</html>