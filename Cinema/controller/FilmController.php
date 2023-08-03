<?php

class FilmController
{
    public function listFilm(){
        $dao = new DAO();

        $sql = "SELECT id_film, titre, picture
        FROM film
        ORDER BY titre ASC;";


        $listFilms = $dao->executeRequest($sql);
        require("view/film/film.php");
    }

    public function addFilmPage(){
        $dao = new DAO();

        require("view/film/addFilm.php");
    }

    public function addCasting(){
        require("view/film/addCasting.php");
    }
}