<?php

class GenreController 
{
    public function listGenre(){
        $dao = new DAO();

        $sql = "SELECT id_genre, libelle, picture
        FROM genre
        ORDER BY libelle ASC;";

        $allGenres = $dao->executeRequest($sql);

        require("view/genre/genre.php");
    }

    public function addGenre(){
        require("view/genre/addGenre.php");
    }
}