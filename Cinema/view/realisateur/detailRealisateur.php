<?php
ob_start();
?>
<div class="container-detailFilm">
<?php
while($detailRea = $infoReas->fetch()){
    if($_GET['id'] == $detailRea['id_realisateur']){ ?>
        <figure class="movie-picture">
            <img src="<?= $detailRea["picture"]; ?>" alt="<?= $detailRea["nom"]; ?> <?= $detailRea["prenom"]; ?>">
            <a href="index.php?action=Modify ActorOrProducer&id=<?= $detailRea["id_personne"]; ?>">modify</a>
        </figure>
        <div class="info-film">
            <div class="title-movie">
                <span class="title-span1">firstname</span>
                <span class="title-span2"><?= $detailRea["nom"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">lastname</span>
                <span class="title-span2"><?= $detailRea["prenom"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">birthday</span>
                <span class="title-span2"><?= $detailRea["date_naissance"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">gender</span>
                <span class="title-span2"><?= $detailRea["sexe"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">number of movie released</span>
                <span class="title-span2"><?= $detailRea["nbFilm"]; ?></span>
            </div>
        </div>
<?php 
    }
}
?>
    <div class="container-card-movie-casting">
            <div class="casting-info">
                <span>movie release</span>
            </div>
<?php 
while($filmRea = $filmReas->fetch()){
    if($_GET['id'] == $filmRea['id_realisateur']){?>
        <div class="card_acteur">
            <a href="index.php?action=Detail Film&id=<?= $filmRea["id_film"]; ?>">
                <img class="imgLastest"src="<?= $filmRea["picture"]; ?>" alt="producer picture">
                <span><?= $filmRea["titre"] ?><br></span>
                <span><?= $filmRea["duree"]; ?>h<br></span>
                <span><?= $filmRea["note_1"];?></span>
                <img class="note-star" src="./public/img/star.png" alt="note star">
            </a>
        </div>

<?php
    }
}
?>
    </div>
</div>

<?php

$title = "";
$content = ob_get_clean();
require("view/template.php");
?>