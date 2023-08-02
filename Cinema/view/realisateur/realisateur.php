<?php
ob_start();
?>

<div>
    <figure class="homeCaroussel">
        <img id="slide" src="./public/img/devenir-acteur.jpeg" alt="image realisateur">
        <div class="title_rea">
            <h1>Realisateurs</h1>
            <h2>All Realisateurs</h2>
        </div>
    </figure>
    <div class="boutonSwipe">
        <input type="button" value="&#10094;" onclick="imgPrecedentRealisateurs();" class="boutonGauche"></input>
        <input type="button" value="&#10095;" onclick="imgSuivanteRealisateurs();" class="boutonDroit"></input>
    </div>
    <div class="card-lastest">
        <?php
        while ($realisateur = $realisateursList->fetch()) { ?>
            <div class="card-rea">
                <a href="index.php?action=Realisateurs?id=<?= $realisateur["id_realisateur"]; ?>">
                    <img class="imgLastest"src="<?= $realisateur["picture"]; ?>" alt="movie picture">
                    <span><?= $realisateur["nom"];?> <?= $realisateur["prenom"]; ?></span>
                </a>
            </div>
        <?php } 
        ?>
    </div>
</div>

<?php
$title = "Realisateurs";
$content = ob_get_clean();
require("view/template.php");
?>