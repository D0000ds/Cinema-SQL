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
            <input type="date" name="date" id="birth"/>
            <select name="select_role" id="select_role">
                <option value="">--Please choose an option--</option>
                <option value="acteur">Acteur</option>
                <option value="realisateur">Realisateur</option>
            </select>
            <input type="file" id="picture_personne" name="picture_personne" accept="image/png, image/jpeg" />
            <input type="button" value="add" id="btn-add-actor-or-rea"/>
        </form>
</div>


<?php
$title = "Add actor/producer";
$content = ob_get_clean();
require("view/template.php");
?>