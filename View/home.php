<?php 
require_once "../Controller/pokeController.php"
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
crossorigin="anonymous">
    <title>PokeAPi whit php</title>


</head>

<body>
    <div class="container">
        <div class="header">
            <header>
                <div class="title">
                    <h1>
                        PokeApi by Fabio Henrique
                    </h1>
                </div>
                <div class="form">
                <form method="post" action="Controller/pokeController.php">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <label for="type">Poke Type:</label>
                    <input type="text" id="type" name="type">
                    <label for="weaknesses">Weaknesses:</label>
                    <input type="text" id="weaknesses" name="weaknesses">
                    <button type="submit">Find</button>
                </form>
                </div>
            </header>
        </div>

        <div class="main">
            <div class="main-container">
                <div class="card">
                    <div class="card-top">
                        <label for="Name"><?php echo $pokename; ?></label>
                    </div>
                    <div class="card-image">
                        <img src="" alt="" >
                    </div>
                    <div class="card-info">
                    </div>
                </div>
            </div>
            <div class="footer">
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
