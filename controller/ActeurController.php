<?php

class ActeurController
{
    public function listActeur(){
        $dao = new DAO();

        $sql = "SELECT id_acteur, nom, prenom, picture
        FROM acteur a, personne p
        WHERE a.id_personne = p.id_personne
        ORDER BY nom ASC;";

        $acteursList = $dao->executeRequest($sql);
        require("view/acteur/acteur.php");
    }

    public function addActeurOuRealisateurPage(){
        $dao = new DAO();

        $valisationRole = isset($_POST['select_role']);
        if($valisationRole == "acteur"){
            if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender']) && isset($_POST['date_naissance']) && isset($_POST['picture_personne'])){
                if($_POST['select_role'] == "acteur"){
                    $sqlAddPersonne = "INSERT INTO personne VALUES (NULL,'".$_POST['name']."', '".$_POST['surname']."', '".$_POST['gender']."', '".$_POST['date_naissance']."');";
                    $dao->executeRequest($sqlAddPersonne);

                    $sqlLastIdPersonne = "SELECT id_personne
                    FROM personne
                    ORDER BY id_personne DESC
                    LIMIT 1;";
                    $getIdPersonne = $dao->executeRequest($sqlLastIdPersonne);

                    $addPictureA = "public/img/".$_POST['picture_personne'];
                    
                    while($idPersonne = $getIdPersonne->fetch()){
                        $sqlAddActeur = "INSERT INTO acteur VALUES(NULL, ".$idPersonne['id_personne'].",'".$addPictureA."')";
                        $dao->executeRequest($sqlAddActeur);
                        break;
                    }
                }
            }
        } 
        if ($valisationRole == "realisateur") {
            if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender']) && isset($_POST['date_naissance']) && isset($_POST['picture_personne'])){
                if($_POST['select_role'] == "realisateur"){
                    $sqlAddPersonneR = "INSERT INTO personne VALUES (NULL,'".$_POST['name']."', '".$_POST['surname']."', '".$_POST['gender']."', '".$_POST['date_naissance']."');";
                    $dao->executeRequest($sqlAddPersonneR);

                    $sqlLastIdPersonneR = "SELECT id_personne
                    FROM personne
                    ORDER BY id_personne DESC
                    LIMIT 1;";
                    $getIdPersonneR = $dao->executeRequest($sqlLastIdPersonneR);

                    $addPicture = "public/img/".$_POST['picture_personne'];
                    
                    while($idPersonneR = $getIdPersonneR->fetch()){
                        $sqlAddRealisateur = "INSERT INTO realisateur VALUES(NULL, ".$idPersonneR['id_personne'].",'".$addPicture."')";
                        $dao->executeRequest($sqlAddRealisateur);
                        break;
                    }
                }
            }

        }
        require("view/acteur/addActorOrRealisateur.php");
    }

    public function detailActeur($id){
        $dao = new DAO();

        $sql = "SELECT nom, prenom, DATE_FORMAT(date_naissance, '%d %M %Y') date_naissance, sexe, a.picture, a.id_acteur, COUNT(c.id_film) nbFilm, p.id_personne
        FROM personne p, acteur a, film f, casting c
        WHERE p.id_personne = a.id_personne
        AND f.id_film = c.id_film
        AND a.id_acteur = c.id_acteur
        GROUP BY a.id_acteur;";

        $sql2 = "SELECT titre, f.picture, f.id_film, a.id_acteur,TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, ROUND(note, 1) AS note_1
        FROM film f, casting c , acteur a, role r
        WHERE c.id_acteur = a.id_acteur
        AND c.id_film = f.id_film
        AND c.id_role = r.id_role;";

        $infoActors = $dao->executeRequest($sql);
        $listFilms = $dao->executeRequest($sql2);

        require("view/acteur/detailActeur.php");
    }
}