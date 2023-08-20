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

        $sql = "SELECT nom, prenom
        FROM personne p, realisateur r
        WHERE p.id_personne = r.id_personne
        ORDER BY nom ASC;";

        $sqlGenre = "SELECT libelle
        FROM genre 
        ORDER BY libelle ASC;";

        $selectsRea =  $dao->executeRequest($sql);
        $selectsGenre =  $dao->executeRequest($sqlGenre);

        if(isset($_POST['title']) && isset($_POST['release']) && isset($_POST['duration']) && isset($_POST['synonpsis']) && isset($_POST['select_genre']) && isset($_POST['select_realisateur']) && isset($_POST['note']) && isset($_POST['picture_film'])){
            $addFilmPicture = "public/img/".$_POST['picture_film'];
            
            
            $sqlAddFilm = "INSERT INTO film VALUES (NULL, '".$_POST['title']."','".$_POST['release']."','".$_POST['duration']."','".$_POST['synonpsis']."','".$_POST['select_realisateur']."','".$_POST['note']."','".$addFilmPicture."');";
            $dao->executeRequest($sqlAddFilm);

            // '".$_POST['select_genre']."'
        }

        require("view/film/addFilm.php");
    }

    public function addCasting(){
        require("view/film/addCasting.php");
    }
}