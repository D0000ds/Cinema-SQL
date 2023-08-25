<?php
ob_start();
?>
<div>
    <h3 class="title-add-actor-or-rea">Modify Actor or Producer</h3>
</div>
<div class="container-form">
    <div class="formulaire">
    <?php
    while($modifyActeur = $modifyActeurs->fetch()){
        if($_GET['id'] == $modifyActeur['id_personne']){?>
            <form action="" method="post">
                <input class="input" type="text" name="nomModifyActor" id="nomModifyActor" placeholder="<?= $modifyActeur["nom"]; ?>"/>
                <input class="input" type="text" name="prenomModifyActor" id="prenomModifyActor" placeholder="<?= $modifyActeur["prenom"]; ?>"/>
                <input class="input_select" type="text" name="sexeModifyActor" id="sexeModifyActor" placeholder="<?= $modifyActeur["sexe"]; ?>"/>
                <input class="input_select" type="date" name="ageModifyActor" id="ageModifyActor" placeholder="<?= $modifyActeur["date_naissance"]; ?>"/>
                <select class="input" name="select_roleModifyActeur" id="select_roleModifyActeur" value="">
                    <option value="">--Please choose an option--</option>
                    <option value="acteur">Acteur</option>
                    <option value="realisateur">Realisateur</option>
                </select>
                <input type="file" name="pictureActor" id="picture_film">
                <input type="submit" name="modify" value="modify" id="modifyAdd"/>
                <input type="submit" name="modify" value="remove" id="modifyRemove"/>
            </form>
    <?php 
    }
        }?>
    </div>

</div>
<?php

$title = "Modify Actor or Producer";
$content = ob_get_clean();
require("view/template.php");
?>