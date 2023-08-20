<?php
ob_start();
?>

<div>
    <h3 class="title-add-actor-or-rea">add actor or realisateur</h3>
</div>
<div class="container-form">
    <div class="formulaire">
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Name"/>
            <input type="text" name="surname" id="surname" placeholder="surname"/>
            <input type="text" name="gender" id="gender" placeholder="gender"/>
            <input type="date" name="date_naissance" id="date_naissance"/>
            <select name="select_role" id="select_role" value="">
                <option value="">--Please choose an option--</option>
                <option value="acteur">Acteur</option>
                <option value="realisateur">Realisateur</option>
            </select>
            <input type="file" id="picture_personne" name="picture_personne" accept="image/png, image/jpeg" />
            <input type="submit" value="add" id="btn-add-actor-or-rea"/>
        </form>
        <?php
            if(isset($_POST['select_role'])){
                if($_POST['select_role'] == "acteur"){
                ?>
                <span class="phraseBienJouéAddActeurEtRea">Bien joué l'acteur a été ajoutée a la base de donnée</span>
                <?php
                }
                if($_POST['select_role'] == "realisateur"){
                    ?>
                    <span class="phraseBienJouéAddActeurEtRea">Bien joué le réalisateur a été ajoutée a la base de donnée</span>
                    <?php
                }
            }
        ?>
    </div>
</div>


<?php
$title = "Add actor/producer";
$content = ob_get_clean();
require("view/template.php");

?>