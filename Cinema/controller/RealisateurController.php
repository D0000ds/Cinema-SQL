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
}