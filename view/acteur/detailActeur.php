<?php
ob_start();
?>

<div class="container-detailFilm">
<?php
while($detailActor = $infoActors->fetch()){
    if($_GET['id'] == $detailActor['id_acteur']){ ?>
        <figure class="movie-picture">
            <img src="<?= $detailActor["picture"]; ?>" alt="<?= $detailActor["nom"]; ?> <?= $detailActor["prenom"]; ?>">
            <a href="index.php?action=Modify ActorOrProducer&id=<?= $detailActor["id_acteur"]; ?>">modify</a>
        </figure>
        <div class="info-film">
            <div class="title-movie">
                <span class="title-span1">firstname</span>
                <span class="title-span2"><?= $detailActor["nom"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">lastname</span>
                <span class="title-span2"><?= $detailActor["prenom"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">birthday</span>
                <span class="title-span2"><?= $detailActor["date_naissance"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">gender</span>
                <span class="title-span2"><?= $detailActor["sexe"]; ?></span>
            </div>
            <div class="title-movie">
                <span class="title-span1">number of movie played</span>
                <span class="title-span2"><?= $detailActor["nbFilm"]; ?></span>
            </div>
        </div>
<?php 
    }
}
?>
    <div class="container-card-movie-casting">
        <div class="casting-info">
            <span>movie played</span>
        </div>
        <?php 
while($listFilm = $listFilms->fetch()){
    if($_GET['id'] == $listFilm['id_acteur']){?>
        <div class="card_acteur">
            <a href="index.php?action=Detail Film&id=<?= $listFilm["id_film"]; ?>">
                <img class="imgLastest"src="<?= $listFilm["picture"]; ?>" alt="acteur picture">
                <span><?= $listFilm["titre"] ?><br></span>
                <span><?= $listFilm["duree"]; ?>h<br></span>
                <span><?= $listFilm["note_1"];?></span>
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