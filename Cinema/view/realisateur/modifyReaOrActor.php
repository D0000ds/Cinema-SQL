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
                <input type="file" name="pictureActor" id="picture_film">
                <input type="submit" name="modify" value="modify" id="modifyAdd"/>
                <input type="submit" name="modify" value="remove" id="modifyRemove"/>
                <?php
                    if(isset($_POST['modify'])){
                        switch($_POST['modify']){
                            case "modify":
                                if(isset($_POST['nomModifyActor']) && isset($_POST['prenomModifyActor']) && isset($_POST['sexeModifyActor']) && isset($_POST['ageModifyActor'])){
                                    ?>
                                    <span class="phraseBienJouéAddActeurEtRea">Bien joué la personne a été modifié</span>
                                    <?php
                                }
                            break;
                        case "remove":
                            ?>
                            <span class="phraseBienJouéAddActeurEtRea">Bien joué la personne a été suprimé</span>
                            <?php
                        break;
                            }
                                    
                        }
                ?>
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