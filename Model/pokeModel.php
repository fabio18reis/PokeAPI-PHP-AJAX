<?php

class PokeModel{
    private $url;

    public function __construct($url){
        $this->url = $url;
    }

    public function getAllPokeInfo(){
        $pokemons = json_decode(file_get_contents($this->url));
        return $pokemons->pokemon;
    }

    public function getPokeById($id){
        $pokemons = $this->getAllPokeInfo();
        foreach($pokemons as $pokemon){
            if($pokemon->id == $id){
                return $pokemon;
        }
    }
    return "Not find a Pokemon for this search.";
}

    public function getPokemonByName($name){
        $pokemons = $this->getAllPokeInfo();
        foreach($pokemons as $pokemon){
            if($pokemon->name == $name){
               return $pokemon;
        }
    }
    return "Not find a Pokemon for this search.";
}
}