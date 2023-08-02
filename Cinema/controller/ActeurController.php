<?php

class ActeurController
{
    public function listActeur(){
        $dao = new DAO();

        $sql = "SELECT id_acteur, nom, prenom, picture
        FROM acteur a, personne p
        WHERE a.id_acteur = p.id_personne
        ORDER BY nom ASC;";

        $acteursList = $dao->executeRequest($sql);
        require("view/acteur/acteur.php");
    }

    public function addActeurOuRealisateurPage(){
        require("view/acteur/addActorOrRealisateur.php");
    }
}