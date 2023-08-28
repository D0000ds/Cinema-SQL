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
        $dao = new DAO();

        if(isset($_POST['modify'])){
            switch($_POST['modify']){
                case "add":
                    if(isset($_POST['libelleGenre'])){
                       $sqlGenre = "INSERT INTO genre VALUES(NULL, '".$_POST['libelleGenre']."', 'public/img/".$_POST['picture_genre']."');";

                       $dao->executeRequest($sqlGenre);
                    }
                    break;
                case "remove":
                    $sqlDeleteGenre = "DELETE FROM genre
                    WHERE libelle = '".$_POST['libelleGenre']."'";
                    
                    $sqlIdGenre = "SELECT id_genre
                    FROM genre
                    ORDER BY id_genre DESC
                    LIMIT 1;";

                    $idgenres = $dao->executeRequest($sqlIdGenre);
                    while($idgenre = $idgenres->fetch()){

                        $sqlDeleteGenre2 = "DELETE FROM genre_film
                        WHERE id_genre = ".$idgenre['id_genre'].";";

                        $dao->executeRequest($sqlDeleteGenre2);
                        $dao->executeRequest($sqlDeleteGenre);
                    }
                    break;
            }   
        }

        require("view/genre/addGenre.php");
    }

    public function detailGenre(){
        $dao = new DAO();

        $sql = "SELECT titre, f.picture, f.id_film, g.id_genre,TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, ROUND(note, 1) AS note_1,libelle
        FROM film f, genre g , genre_film gf
        WHERE f.id_film = gf.id_film
        AND g.id_genre = gf.id_genre;";

        $sql2 = "SELECT g.id_genre, libelle
        FROM genre g , genre_film gf
        WHERE g.id_genre = gf.id_genre;";

        $listGenres = $dao->executeRequest($sql);
        $libelleGenres = $dao->executeRequest($sql2);

        require("view/genre/detailGenre.php");
    }
}