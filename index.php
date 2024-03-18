<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <form method="post" id="pokeForm">
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
                    <div class="card-top" id="card-top">
                        <label for="Name"><?php echo isset($namePoke) ? $namePoke : ""; ?></label>
                    </div>
                    <div class="card-image" id="card-image">
                        <img src="<?php echo isset($imgPoke) ? $imgPoke : ""; ?>" alt="">
                    </div>
                    <div class="card-info" id="card-info">
                        <?php echo isset($idPoke) ? "ID: " . $idPoke . "<br>" : ""; ?>
                        <?php echo isset($typePoke) ? "Type: " . $typePoke . "<br>" : ""; ?>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Intercepta o envio do formulário
        $('#pokeForm').submit(function(event) {
            event.preventDefault(); // Impede o envio tradicional do formulário

            // Obtém o valor do campo name
            var pokeName = $('#name').val();

            // Envia uma solicitação AJAX para o controlador com o valor do campo name
            $.ajax({
                type: 'POST',
                url: 'Controller/pokeController.php',
                data: {
                    name: pokeName
                }, // Se o campo name estiver vazio, envia "Pikachu"
                dataType: 'json',
                success: function(response) {
                    // Atualiza a div com os dados do Pokémon
                    $('#card-top').html("<label for='Name'>" + response.name + "</label>");
                    $('#card-image').html("<img src='" + response.img + "' alt=''>");
                    $('#card-info').html("ID: " + response.id + "<br>Type: " + response.type
                        .join(', '));
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#card-top').html("Erro ao carregar os dados do Pokémon.");
                }
            });
        });
    });
    </script>



</body>

</html>