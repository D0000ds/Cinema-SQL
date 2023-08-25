<?php
ob_start();
?>
<div>
    <h3 class="title-add-actor-or-rea">Modify film</h3>
</div>
<div class="container-form">
    <div class="formulaire">
        <?php
        while($infoFilm = $infoFilms->fetch()){
            if($_GET['id'] == $infoFilm['id_film']){?>
                <form action="" method="post">
                    <input class="input" type="text" name="titleModify" id="titleModify" placeholder="<?= $infoFilm["titre"]; ?>"/>
                    <input class="input" type="date" name="dateModify" id="dateModify" placeholder="<?= $infoFilm["annee_sortie_fr"]; ?> "/>
                    <input class="input" type="number" name="durationModify" id="durationModify" placeholder="<?= $infoFilm["duree"]; ?>"/>
                    <input class="input" type="number" name="noteModify" id="noteModify" placeholder="<?= $infoFilm["note"]; ?>"/>
                    <input type="text" name="synopsisModify" id="synopsisModify" placeholder="<?= $infoFilm["synopsis"]; ?>"/>
                    <select class="input_select" name="genreModify" id="genreModify">
                        <option value="<?= $infoFilm['id_genre']; ?>"><?= $infoFilm["libelle"]; ?></option>
                        <?php
                        while($modifyGenre = $modifyGenres->fetch()){
                            echo'<option value="'.$modifyGenre['id_genre'].'">'.$modifyGenre['libelle'].'</option>';
                        }
                        ?>
                    </select>
                    <a href="index.php?action=Add Gender"><span class="btnAddFilm">add</span></a>
                    <select class="input_select" name="producerModify" id="producerModify">
                        <option value="<?= $infoFilm['id_realisateur']; ?>"><?= $infoFilm['nom']; ?> <?= $infoFilm['prenom']; ?></option>
                        <?php
                            while($modifyRea = $modifyReas->fetch()){
                                echo'<option value="'.$modifyRea['id_realisateur'].'">'.$modifyRea['nom'].' '.$modifyRea['prenom'].'</option>';
                            }
                        ?>
                    </select>
                    <a href="index.php?action=Add actor/producer"><span class="btnAddFilm">add</span></a>
                    <input type="file" name="picture_film" id="picture_film">
                    <input type="submit" value="modify" id="modifyAdd"/>
                    <input type="submit" value="remove" id="modifyRemove"/>
                </form>
    <?php }
        }
        ?>
        <div>
            <h3 class="title-add-actor-or-rea">add casting</h3>
        </div>
        <select name="chooseActor" id="chooseActor">
                <option value="">--Please choose an actor--</option>
                <?php

                ?>
        </select>
        <select class="input_select" name="chooseRole" id="chooseRole">
                <option value="">--Please choose a role--</option>
                <?php

                ?>
        </select>
        <a href="index.php?action=Add Role"><span class="btnAddFilm">add</span></a>
        <input type="submit" value="add" id="addCastingButton"/>
        <input type="submit" value="remove" id="castingRemove"/>
    </div>
</div>
<?php
$title = "Modify Movie";
$content = ob_get_clean();
require("view/template.php");
?>