<?php

class RealisateurController 
{
    public function listRealisateur(){
        $dao = new DAO();

        $sql = "SELECT id_realisateur, nom, prenom, picture
        FROM realisateur r,personne p
        WHERE r.id_personne = p.id_personne
        ORDER BY nom ASC;";

        $realisateursList = $dao->executeRequest($sql);

        require("view/realisateur/realisateur.php");
    }

    public function detailRea($id){
        $dao = new DAO();

        $sql = "SELECT nom, prenom, DATE_FORMAT(date_naissance, '%d %M %Y') date_naissance, sexe, r.picture, r.id_realisateur, COUNT(f.id_film) nbFilm
        FROM personne p, realisateur r, film f
        WHERE p.id_personne = r.id_personne
        AND r.id_realisateur = f.id_realisateur
        GROUP BY r.id_realisateur;";

        $sql2 = "SELECT titre, f.picture, f.id_film, r.id_realisateur,TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, ROUND(note, 1) AS note_1
        FROM film f, realisateur r
        WHERE r.id_realisateur = f.id_realisateur;";

        $infoReas = $dao->executeRequest($sql);
        $filmReas = $dao->executeRequest($sql2);
        require("view/realisateur/detailRealisateur.php");
    }

    public function modifyReaOrActor($id){
        $dao = new DAO();

        require("view/realisateur/modifyReaOrActor.php");
    }
}