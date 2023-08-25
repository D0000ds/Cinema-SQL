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
                    <input class="input" type="number" name="noteModify" id="noteModify" step="0.1" placeholder="<?= $infoFilm["note"]; ?>"/>
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
                    <input type="submit" name="modify" value="modify" id="modifyAdd"/>
                    <input type="submit" name="modify" value="remove" id="modifyRemove"/>
                    <?php
                        if(isset($_POST['modify'])){
                            switch($_POST['modify']){
                                case "modify":
                                    if(isset($_POST['titleModify']) && isset($_POST['dateModify']) && isset($_POST['durationModify']) && isset($_POST['noteModify']) && isset($_POST['synopsisModify']) && isset($_POST['genreModify']) && isset($_POST['producerModify']) && isset($_POST['picture_film'])){
                                        ?>
                                        <span class="phraseBienJouéAddActeurEtRea">Bien joué le film a été modifié</span>
                                        <?php
                                    break;
                                    }
                                case "remove":
                                        ?>
                                        <span class="phraseBienJouéAddActeurEtRea">Bien joué le film a été suprimé</span>
                                        <?php
                                        break;
                            }
                                    
                        }
                    ?>
                </form>
    <?php }
        }
        ?>
        <div>
            <h3 class="title-add-actor-or-rea">add casting</h3>
        </div>
        <form action="" method="post">
            <select name="chooseActor" id="chooseActor">
                    <option value="">--Please choose an actor--</option>
                    <?php
                        while($modifylistActor= $modifylistsActor->fetch()){
                            echo'<option value="'.$modifylistActor['id_acteur'].'">'.$modifylistActor['nom'].' '.$modifylistActor['prenom'].'</option>';
                        }
                    ?>
            </select>
            <select class="input_select" name="chooseRole" id="chooseRole">
                    <option value="">--Please choose a role--</option>
                    <?php
                        while($modifyListRole= $modifyListsRoles->fetch()){
                            echo'<option value="'.$modifyListRole['id_role'].'">'.$modifyListRole['libelle'].'</option>';
                        }
                    ?>
            </select>
            <a href="index.php?action=Add Role"><span class="btnAddFilm">add</span></a>
            <input type="submit" name="castingAddButton" value="add" id="addCastingButton"/>
            <input type="submit" name="castingAddButton" value="remove" id="castingRemove"/>
            <?php
                if(isset($_POST['castingAddButton'])){
                    switch($_POST['castingAddButton']){
                        case "add":
                            if(isset($_POST['chooseRole']) && isset($_POST['chooseActor'])){
                                ?>
                                    <span class="phraseBienJouéAddActeurEtRea">Bien joué le cating a été ajouté</span>
                                <?php
                                break;
                            }
                            case "remove":
                                ?>
                                    <span class="phraseBienJouéAddActeurEtRea">Bien joué le casting a été suprimé</span>
                                <?php
                                break;
                    }
                                    
                }
            ?>
        </div>
        </form>
</div>
<?php
$title = "Modify Movie";
$content = ob_get_clean();
require("view/template.php");
?>