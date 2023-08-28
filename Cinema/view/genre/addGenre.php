<?php
ob_start();
?>

<div>
    <h3 class="title-add-actor-or-rea">add genre</h3>
</div>
<div class="container-form">
    <div class="formulaire">
        <form action="" method="post">
            <input class="input" type="text" name="libelleGenre" id="titleModify" placeholder="Libelle"/>
            <input type="file" name="picture_genre" id="picture_film">
            <input type="submit" name="modify" value="add" id="modifyAdd"/>
            <input type="submit" name="modify" value="remove" id="modifyRemove"/>
            <?php
            if(isset($_POST['modify'])){
                switch($_POST['modify']){
                    case "add":
                        if(isset($_POST['libelleGenre'])){
                            ?>
                                <span class="phraseBienJouéAddActeurEtRea">Bien joué le genre a été ajouté</span>
                            <?php
                        }
                    break;
                    case "remove":
                        ?>
                            <span class="phraseBienJouéAddActeurEtRea">Bien joué le genre a été suprimé</span>
                        <?php
                    break;
                }
                                    
            }
        ?>
        </form>
    </div>
</div>

<?php
$title = "add Gender";
$content = ob_get_clean();
require("view/template.php");
?>