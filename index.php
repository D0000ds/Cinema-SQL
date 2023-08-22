<?php
require("controller/HomeController.php");
require("controller/FilmController.php");
require("controller/ActeurController.php");
require("controller/GenreController.php");
require("controller/RealisateurController.php");
require("app/DAO.php");

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
        case "Detail Film":
            $f1->detailFilm($_GET['id']);
            break;
        case "Detail Acteur":
            $a1->detailActeur($_GET['id']);
            break;
        case "Detail Realisateur":
            $r1->detailRea($_GET['id']);
            break;
        case "Detail Genre":
            $g1->detailGenre($_GET['id']);
            break;
        case "Modify Film":
            $f1->modifyFilm($_GET['id']);
            break;
        case "Modify ActorOrProducer":
            $r1->modifyReaOrActor($_GET['id']);
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
        case "Add Gender":
            $g1->addGenre();
            break;
        default:
            $h1->HomePage();
            break;
    }
} else {
    $h1->HomePage();
}
