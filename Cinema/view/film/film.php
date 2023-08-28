<?php
ob_start();
?>
<figure class="homeCaroussel">
    <img id="slide" src="./public/img/GettyImages-1336937059-1600x728.jpg" alt="image film">
    <div class="title-film">
        <h1>Films</h1>
        <h2>All films</h2>
    </div>
    </figure>
<div class="boutonSwipe">
        <input type="button" value="&#10094;" onclick="imgSuivanteFilm();" class="boutonGauche"></input>
        <input type="button" value="&#10095;" onclick="imgPrecedentFilm();" class="boutonDroit"></input>
</div>
<div class="card-lastest">
        <?php
        while ($film = $listFilms->fetch()) { ?>
            <div class="card-film">
                <a href="index.php?action=Detail Film&id=<?= $film["id_film"]; ?>">
                    <img class="imgLastest"src="<?= $film["picture"]; ?>" alt="movie picture">
                    <span><?= $film["titre"]; ?></span>
                </a>
            </div>
        <?php } 
        ?>
</div>

<?php
$title = "Films";
$content = ob_get_clean();
require "view/template.php";