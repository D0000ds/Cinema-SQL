<?php
ob_start();
?>
<link rel="stylesheet" href="./public/css/style.css">

<div>
    <figure class="homeCaroussel">
        <img id="slide" src="./public/img/barbie-film-margot-robbie-ryan-gosling-top.webp" alt="image film">
        <div class="title">
            <h1>cinema</h1>
            <h2>sql</h2>
        </div>
    </figure>
    <div class="boutonSwipe">
        <input type="button" value="&#10094;" onclick="imgPrecedent();" class="boutonGauche"></input>
        <input type="button" value="&#10095;" onclick="imgSuivante();" class="boutonDroit"></input>
    </div>
    <div class="lastest">
        <h3>Lastest</h3>
    </div>
    <div class="card-lastest">
        <?php
        while ($lastestFilm = $lastestFilms->fetch()) { ?>
            <div class="card">
                <a href="index.php?action=Films?id=<?= $lastestFilm["id_film"]; ?>">
                    <img class="imgLastest"src="<?= $lastestFilm["picture"]; ?>" alt="movie picture">
                    <span><?= $lastestFilm["titre"]; ?><br></span>
                    <span><?= $lastestFilm["duree"]; ?>h<br></span>
                    <span><?= $lastestFilm["note_1"];?></span>
                    <img class="note-star" src="./public/img/star.png" alt="note star">
                </a>
            </div>
        <?php } 
        ?>
    </div>
</div>

<?php
$title = "Home";
$content = ob_get_clean();
require("view/template.php");
?>
