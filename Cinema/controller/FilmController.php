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

    public function detailFilm(){
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

        $sql = "SELECT f.id_film, titre, f.picture, DATE_FORMAT(annee_sortie_fr, '%d/%m/%Y') annee_sortie_fr,duree,synopsis,nom,prenom, f.id_realisateur, note, libelle, g.id_genre
        FROM film f, personne p, realisateur r, genre g ,genre_film gf
        WHERE p.id_personne = r.id_personne
        AND f.id_realisateur = r.id_realisateur
        AND g.id_genre = gf.id_genre
        AND f.id_film = gf.id_film;";

        $sql2 = "SELECT libelle, id_genre
        FROM genre 
        ORDER BY libelle ASC;";

        $sql3 = "SELECT nom, prenom, id_realisateur
        FROM personne p, realisateur r
        WHERE p.id_personne = r.id_personne
        ORDER BY nom ASC;";

        $sql4 = "SELECT nom, prenom, id_acteur
        FROM personne p,acteur a
        WHERE p.id_personne = a.id_personne
        ORDER BY nom ASC;";

        $sql5 = "SELECT libelle, id_role
        FROM role r";

        $infoFilms = $dao->executeRequest($sql);
        $modifyGenres = $dao->executeRequest($sql2);
        $modifyReas = $dao->executeRequest($sql3);
        $modifylistsActor = $dao->executeRequest($sql4);
        $modifyListsRoles = $dao->executeRequest($sql5);
        
        if(isset($_POST['modify'])){
            switch($_POST['modify']){
                case "modify":
                    if(isset($_POST['titleModify']) && isset($_POST['dateModify']) && isset($_POST['durationModify']) && isset($_POST['noteModify']) && isset($_POST['synopsisModify']) && isset($_POST['genreModify']) && isset($_POST['producerModify']) && isset($_POST['picture_film'])){
                        $sqlUpdate = "UPDATE film
                        SET titre= '".$_POST['titleModify']."', annee_sortie_fr = '".$_POST['dateModify']."', duree = '".$_POST['durationModify']."', synopsis = '".$_POST['synopsisModify']."', note = '".$_POST['noteModify']."', id_realisateur=".$_POST['producerModify'].", picture = 'public/img/".$_POST['picture_film']."'
                        WHERE id_film = ".$id.";";
                
                        $sqlUpdateGenre = "UPDATE genre_film
                        SET id_genre = ".$_POST['genreModify']."
                        WHERE id_film =".$id;
                
                        $dao->executeRequest($sqlUpdate);
                        $dao->executeRequest($sqlUpdateGenre);
                    }
                    break;
                    
                case "remove":
                    $sqlDeleteGenre = "DELETE FROM genre_film
                    WHERE id_film = ".$id.";";
                    $sqlDelete = "DELETE FROM film
                    WHERE id_film = ".$id.";";
        
        
                    $dao->executeRequest($sqlDeleteGenre);
                    $dao->executeRequest($sqlDelete);
                    break;
            }
        }

        if(isset($_POST['castingAddButton'])){
            switch($_POST['castingAddButton']){
                case "add":
                    if(isset($_POST['chooseRole']) && isset($_POST['chooseActor'])){
                       $sqlCasting = "INSERT INTO casting VALUES(".$id.", ".$_POST['chooseActor'].", ".$_POST['chooseRole'].");";

                       $dao->executeRequest($sqlCasting);
                    }
                    break;
                case "remove":
                    $sqlCastingRemove = "DELETE FROM casting
                    WHERE id_film = ".$id."
                    AND id_acteur = '".$_POST['chooseActor']."'
                    AND id_role = '".$_POST['chooseRole']."';";

                    $dao->executeRequest($sqlCastingRemove);
                    break;
            }   
        }
    require("view/film/modifyFilm.php");
    }

    public function addRole(){
        $dao = new Dao();
        

        if(isset($_POST['modify'])){
            switch($_POST['modify']){
                case "add":
                    if(isset($_POST['libelleRole'])){
                       $sqlRole = "INSERT INTO role VALUES(NULL, '".$_POST['libelleRole']."');";

                       $dao->executeRequest($sqlRole);
                    }
                    break;
                case "remove":
                    $sqlDeleteRole = "DELETE FROM role
                    WHERE libelle = '".$_POST['libelleRole']."'";
                    
                    $sqlIdRole = "SELECT id_role
                    FROM role
                    ORDER BY id_role DESC
                    LIMIT 1;";

                    $idroles = $dao->executeRequest($sqlIdRole);
                    while($idrole = $idroles->fetch()){

                        $sqlDeleteRole2 = "DELETE FROM casting
                        WHERE id_role = ".$idrole['id_role'].";";

                        $dao->executeRequest($sqlDeleteRole2);
                        $dao->executeRequest($sqlDeleteRole);
                    }
                    break;
            }   
        }

        require("view/film/addRole.php");
    }
}
