<?php
ob_start();
?>

<div>
    <figure class="homeCaroussel">
            <img id="slide" src="./public/img/2180999-elements-de-genre-de-film-vectoriel.jpg" alt="image genre">
            <div class="title">
                <h1>Genres</h1>
                <h2>All genres</h2>
            </div>
        </figure>
    <div class="boutonSwipe">
        <input type="button" value="&#10094;" onclick="imgPrecedentGenre();" class="boutonGauche"></input>
        <input type="button" value="&#10095;" onclick="imgSuivanteGenre();" class="boutonDroit"></input>
    </div>
    <div class="card-lastest">
        <?php
        while ($genre = $allGenres->fetch()) { ?>
            <div class="GenresCard">
                <a href="index.php?action=Detail Genre&id=<?= $genre["id_genre"]; ?>">
                    <img class="imgLastest"src="<?= $genre["picture"]; ?>" alt="genre picture">
                    <span><?= $genre["libelle"]; ?></span>
                </a>
            </div>
        <?php } 
        ?>
</div>

<?php
$title = "Genres";
$content = ob_get_clean();
require("view/template.php");
?>
