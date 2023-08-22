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

        $sql = "SELECT nom, prenom, id_realisateur
        FROM personne p, realisateur r
        WHERE p.id_personne = r.id_personne
        ORDER BY nom ASC;";

        $sqlGenre = "SELECT libelle, id_genre
        FROM genre 
        ORDER BY libelle ASC;";

        $selectsRea =  $dao->executeRequest($sql);
        $selectsGenre =  $dao->executeRequest($sqlGenre);

        if(isset($_POST['title']) && isset($_POST['release']) && isset($_POST['duration']) && isset($_POST['synonpsis']) && isset($_POST['select_genre']) && isset($_POST['select_realisateur']) && isset($_POST['picture_film'])){
            $addFilmPicture = "public/img/".$_POST['picture_film'];
            
            $sqlAddFilm = "INSERT INTO film VALUES (NULL, '".$_POST['title']."','".$_POST['release']."','".$_POST['duration']."','".$_POST['synonpsis']."','".NULL."','".$_POST['select_realisateur']."','".$addFilmPicture."');";
            $dao->executeRequest($sqlAddFilm);

            $sqlIdFilm = "SELECT id_film
            FROM film
            ORDER BY id_film DESC
            LIMIT 1;
            ";
            $sqlIdLastFilm = $dao->executeRequest($sqlIdFilm);

            while($idFilmG = $sqlIdLastFilm->fetch()){
                $sqlAddGenreFilm = "INSERT INTO genre_film VALUES(".$idFilmG['id_film'].", '".$_POST['select_genre']."');";
                $dao->executeRequest($sqlAddGenreFilm);
                break;
            }

            
        }

        require("view/film/addFilm.php");
    }

    public function addCasting(){
        require("view/film/addCasting.php");
    }

    public function detailFilm($id){
        $dao = new DAO();

        $sql = "SELECT id_film, titre, f.picture, DATE_FORMAT(annee_sortie_fr, '%d %M %Y') annee_sortie_fr,duree,synopsis,nom,prenom, f.id_realisateur, note
        FROM film f, personne p, realisateur r
        WHERE p.id_personne = r.id_personne
        AND f.id_realisateur = r.id_realisateur;";

        $sql2 = "SELECT nom, prenom ,libelle, a.picture, f.id_film, a.id_acteur
        FROM casting c ,personne p, role r, acteur a, film f
        WHERE c.id_film = f.id_film
        AND c.id_acteur = a.id_acteur
        AND c.id_role = r.id_role
        AND p.id_personne = a.id_personne;";

        $sql3="SELECT g.id_genre, libelle, f.id_film
        FROM genre g, genre_film gf, film f
        WHERE g.id_genre = gf.id_genre
        AND f.id_film = gf.id_film;";
        
        $sqls2 = $dao->executeRequest($sql2);
        $sqls = $dao->executeRequest($sql);
        $sqls3 = $dao->executeRequest($sql3);
        require("view/film/filmDetail.php");
    }

    public function modifyFilm($id){
        $dao = new DAO();

        require("view/film/modifyFilm.php");
    }
}