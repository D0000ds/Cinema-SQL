<?php
ob_start();
?>

<div class="container-genre">
    <div class="title-genre">
    <?php
    while($libelleGenre = $libelleGenres->fetch()){
        if($_GET['id'] == $libelleGenre['id_genre']){?>
            <h3>all <?= $libelleGenre["libelle"]; ?> movies</h3>
        <?php
        break;
        }
    }
    ?>
    </div>
    <div class="genre-card">
    <?php 
    while($listGenre = $listGenres->fetch()){
        if($_GET['id'] == $listGenre['id_genre']){
            ?>
                <div class="card_acteur">
                    <a href="index.php?action=Detail Film&id=<?= $listGenre["id_film"]; ?>">
                        <img class="imgLastest"src="<?= $listGenre["picture"]; ?>" alt="acteur picture">
                        <span><?= $listGenre["titre"] ?><br></span>
                        <span><?= $listGenre["duree"]; ?>h<br></span>
                        <span><?= $listGenre["note_1"];?></span>
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
$title = "Detail genre";
$content = ob_get_clean();
require("view/template.php");
?>