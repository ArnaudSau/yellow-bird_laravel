<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location details</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #E4DA4F;
        }

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
    <div class="container">
        <div class="infos">
            <a href="/locations">retour</a>
            <h2>Détails sur le lieu</h2>
            <div class="details">
                <p>Nom :  <br><?php echo $location->name; ?></p>
                <p>Description :<br> <?php echo $location->description; ?></p>
                <p>Anecdote :<br> <?php echo $location->anecdote; ?></p>
                <p>PathImage :<br> <?php echo $location->pathImage; ?></p>
                <p>Longitude :<br> <?php echo $location->longitude; ?></p>
                <p>Latitude :<br> <?php echo $location->latitude; ?></p>
            </div>
        </div>
    </div>

</body>

</html>