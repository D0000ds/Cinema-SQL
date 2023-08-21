<?php
ob_start();
?>

<div>
    <h3 class="title-add-actor-or-rea">add film</h3>
</div>
<div class="container-form">
    <div class="formulaire">
        <form action="" method="post">
            <input type="text" name="title" id="title" placeholder="Title"/>
            <input type="date" name="release" id="release"/>
            <input type="number" name="duration" id="duration" step=".1" placeholder="Duration in minutes"/>
            <input type="text" name="synonpsis" id="synonpsis" placeholder="Synonpsis"/>
            <select name="select_genre" id="select_genre" value="">
                <option value="">--Please choose a Gender--</option>
                <?php
                    while($selectGenre = $selectsGenre->fetch()){
                        echo'<option value="'.$selectGenre['id_genre'].'">'.$selectGenre['libelle'].'</option>';
                        
                    }

                ?>
            </select>
            <a href="index.php?action=Add Gender"><span class="btnAddFilm">add</span></a>
            <select name="select_realisateur" id="select_realisateur">
                <option value="">--Please choose an producer--</option>
                <?php
                    while($selectRea = $selectsRea->fetch()){
                        echo'<option value="'.$selectRea['id_realisateur'].'">'.$selectRea['nom'].' '.$selectRea['prenom'].'</option>';
                        
                    }

                ?>
            </select>
            <a href="index.php?action=Add actor/producer"><span class="btnAddFilm">add</span></a>
            <input type="file" name="picture_film" id="picture_film">
            <input type="submit" value="add" id="btn-add-actor-or-rea"/>
        </form>
        <?php
            if(isset($_POST['title']) && isset($_POST['release']) && isset($_POST['duration']) && isset($_POST['synonpsis']) && isset($_POST['select_genre']) && isset($_POST['select_realisateur']) && isset($_POST['picture_film'])){
                ?>
                <span class="phraseBienJouéAddActeurEtRea">Bien joué le film a été ajoutée a la base de donnée</span>
                <?php
            }
        ?>
</div>



<?php

$title = "Add film";
$content = ob_get_clean();
require("view/template.php");
?>
