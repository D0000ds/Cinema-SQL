<?php
ob_start();
?>

<div>
    <figure class="homeCaroussel">
        <img id="slide" src="./public/img/robert-downey-jr.jpeg" alt="image acteur">
        <div class="title">
            <h1>Acteurs</h1>
            <h2>All acteurs</h2>
        </div>
    </figure>
    <div class="boutonSwipe">
        <input type="button" value="&#10094;" onclick="imgPrecedentActeurs();" class="boutonGauche"></input>
        <input type="button" value="&#10095;" onclick="imgSuivanteActeurs();" class="boutonDroit"></input>
    </div>
    <div class="card-lastest">
        <?php
        while ($acteur = $acteursList->fetch()) { ?>
            <div class="card_acteur" <?php if($acteur["nom"] == "Personne Supprimer"){echo "style='display: none;'";} ?>>
                <a href="index.php?action=Detail Acteur&id=<?= $acteur["id_acteur"]; ?>">
                    <img class="imgLastest"src="<?= $acteur["picture"]; ?>" alt="acteur picture">
                    <span><?= $acteur["nom"] ?> <?= $acteur["prenom"] ?></span>
                </a>
            </div>
        <?php } 
        ?>
    </div>
</div>

<?php
$title = "Acteurs";
$content = ob_get_clean();
require "view/template.php";