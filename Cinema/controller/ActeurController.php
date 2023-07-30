<?php

class ActeurController
{
    public function listActeur(){
        require("view/acteur/acteur.php");
    }

    public function addActeurOuRealisateurPage(){
        require("view/acteur/addActorOrRealisateur.php");
    }
}