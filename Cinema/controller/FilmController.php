<?php

class FilmController
{
    public function listFilm(){
        require("view/film/film.php");
    }

    public function addFilmPage(){
        require("view/film/addFilm.php");
    }

    public function addCasting(){
        require("view/film/addCasting.php");
    }
}