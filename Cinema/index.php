<?php
require("controller/HomeController.php");
require("controller/FilmController.php");
require("controller/ActeurController.php");
require("controller/GenreController.php");
require("controller/RealisateurController.php");

$h1 = new HomeController();
$f1 = new FilmController();
$a1 = new ActeurController();
$g1 = new GenreController();
$r1 = new RealisateurController();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case "Films":
            $f1->listFilm();
            break;
        case "Acteurs":
            $a1->listActeur();
            break;
        case "Genres":
            $g1->listGenre();
            break;
        case "Realisateurs":
            $r1->listRealisateur();
            break;
        case "Add film":
            $f1->addFilmPage();
            break;
        case "Add actor/producer":
            $a1->addActeurOuRealisateurPage();
            break;
        case "Add Casting":
            $f1->addCasting();
            break;
        default:
            $h1->HomePage();
            break;
    }
} else {
    $h1->HomePage();
}