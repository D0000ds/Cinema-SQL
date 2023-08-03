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
            <input type="text" name="release" id="release" placeholder="Release date"/>
            <input type="text" name="duration" id="duration" placeholder="Duration in minutes"/>
            <input type="text" name="synonpsis" id="synonpsis" placeholder="Synonpsis"/>
            <select name="select_genre" id="select_genre" value="">
                <option value="">--Please choose an option--</option>
                <?php


                ?>
            </select>
            <a href="index.php?action=Detail gender"><button class="btnAddFilm">add</button></a>
            <select name="select_realisateur" id="select_realisateur">
                <option value="">--Please choose an option--</option>
                <?php


                ?>
            </select>
            <a href="Add actor/producer"><button class="btnAddFilm">add</button></a>
            <input type="number" name="note" id="note" placeholder="Notation">
            <input type="submit" value="add" id="btn-add-actor-or-rea"/>
        </form>
</div>



<?php
$title = "Add film";
$content = ob_get_clean();
require("view/template.php");
?>
