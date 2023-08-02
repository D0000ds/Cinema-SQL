<?php

class HomeController 
{
    public function HomePage(){
        $dao = new DAO();

        $sql = "SELECT id_film, titre, DATE_FORMAT(annee_sortie_fr, '%Y') annee_sortie_fr, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, ROUND(note, 1) AS note_1, picture 
        FROM film
        ORDER BY annee_sortie_fr DESC
        LIMIT 5";

        $lastestFilms = $dao->executeRequest($sql);
        require("view/home/home.php");
    }
}