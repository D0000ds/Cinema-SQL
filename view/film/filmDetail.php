<?php
ob_start();
?>

<div class="container-detailFilm">
<?php
while($detail = $sql->fetch()){
    if($_GET['id'] == $detail['id_film']){ ?>
    <figure class="movie-picture">
        <img src="<?= $detail["picture"]; ?>" alt="<?= $detail["titre"]; ?>">
        <a href="index.php?action=Modify Film&id=<?= $detail["id_film"]; ?>">modify</a>
    </figure>
    <div class="info-film">
        <div class="title-movie">
            <span class="title-span1">title</span>
            <span class="title-span2"><?= $detail["titre"]; ?></span>
        </div>
        <div class="title-movie">
            <span class="title-span1">duration</span>
            <span class="title-span2"><?= $detail["duree"]; ?> minutes</span>
        </div>
        <div class="title-movie">
            <span class="title-span1">release date</span>
            <span class="title-span2"><?= $detail["annee_sortie_fr"]; ?></span>
        </div>
        <div class="title-movie">
            <span class="title-span1">producer</span>
            <a href="index.php?action=Detail Realisateur&id=<?= $detail["id_realisateur"]; ?>"><?= $detail["nom"]; ?> <?= $detail["prenom"]; ?></a>
        </div>
        <div class="title-movie">
            <span class="title-span1">synopsis</span>
            <span class="title-span2"><?= $detail["synopsis"]; ?></span>
        </div>
        <figure>
            <span class="title-span1">note</span>
            <span><?= $detail["note"]; ?></span>
            <img src="./public/img/star.png" alt="star">
        </figure>
    </div>
<?php 
    }
}
?>
    <div class="container-card-movie-casting">
        <div class="casting-info">
            <span>casting</span>
        </div>
<?php 
while($detailCasting = $sql2->fetch()){
    if($_GET['id'] == $detailCasting['id_film']){?>
        <div class="card_acteur">
            <a href="index.php?action=Detail Acteur&id=<?= $detailCasting["id_acteur"]; ?>">
                <img class="imgLastest"src="<?= $detailCasting["picture"]; ?>" alt="acteur picture">
                <span><?= $detailCasting["nom"] ?> <?= $detailCasting["prenom"] ?></span>
                <span><br><?= $detailCasting["libelle"] ?></span>
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