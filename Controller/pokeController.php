<?php

require_once '../Model/pokeModel.php';

class PokeController
{

    private $pokeModel;

    public function __construct(PokeModel $pokeModel)
    {
        $this->pokeModel = $pokeModel;
    }

    public function showPokeByName($name)
    {
        $pokemon = $this->pokeModel->getPokemonByName($name);
        if ($pokemon) {

            $namePoke = $pokemon->name;
            $imgPoke = $pokemon->img;
            $idPoke = $pokemon->id;
            $typePoke = $pokemon->type;

            // Construir um array associativo com os dados do Pokémon
            $responseData = array(
                'name' => $namePoke,
                'img' => $imgPoke,
                'id' => $idPoke,
                'type' => $typePoke
            );

            // Retornar os dados como JSON
            header('Content-Type: application/json');
            echo json_encode($responseData);
            
        } else {
            // Se o Pokémon não for encontrado, retorne uma mensagem de erro
            echo json_encode(array('error' => 'Pokémon não encontrado.'));
        }
    }
}

// Verificar se o nome do Pokémon foi enviado via POST
if (isset($_POST['name'])) {
    $pokename = $_POST['name'];
} else {
    // Se o nome do Pokémon não foi enviado, retornar uma mensagem de erro
    echo json_encode(array('error' => 'Nome do Pokémon não fornecido.'));
    exit; // Encerrar o script
}

// Instanciar o modelo e o controlador
$pokeModel = new PokeModel("https://www.canalti.com.br/api/pokemons.json");
$pokemonController = new PokeController($pokeModel);

// Chamar o método para mostrar o Pokémon pelo nome
$pokemonController->showPokeByName($pokename);
