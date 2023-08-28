<?php
ob_start();
?>

<div class="container-detailFilm">
<?php
while($detail = $sqls->fetch()){
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
            <a class="title-span2" href="index.php?action=Detail Realisateur&id=<?= $detail["id_realisateur"]; ?>"><?= $detail["nom"]; ?> <?= $detail["prenom"]; ?></a>
        </div>
        <div class="title-movie">
            <span class="title-span1">Genre</span>
            <?php
            while($listgenre = $sqls3->fetch()){
                if($_GET['id'] == $listgenre['id_film']){?>
                    <a class="title-span2" href="index.php?action=Detail Genre&id=<?= $listgenre["id_genre"]; ?>"><?= $listgenre["libelle"]; ?></a>
                <?php 
                }
            }?>
        </div>
        <div class="title-movie">
            <span class="title-span1">synopsis</span>
            <span class="title-span2"><?= $detail["synopsis"]; ?></span>
        </div>
        <figure class="figNote">
            <span class="title-span1">note</span>
            <span class="title-span2"> <?php if($detail["note"] == NULL){echo"This film has no rating yet";}else{ echo $detail["note"];} ?></span>
            <img src="./public/img/star.png" alt="star" style="display:<?php if($detail["note"] == NULL){echo"none";} ?>;">
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
while($detailCasting = $sqls2->fetch()){
    if($_GET['id'] == $detailCasting['id_film']){?>
        <div class="card_acteur" <?php if($detailCasting["nom"] == "Personne Supprimer"){echo "style='display: none;'";} ?>>
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