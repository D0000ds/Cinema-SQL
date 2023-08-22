<?php
ob_start();
?>
<div>
    <h3 class="title-add-actor-or-rea">Modify film</h3>
</div>
<div class="container-form">
    <div class="formulaire">
        <form action="" method="post">
            <input class="input" type="text" name="titleModify" id="titleModify" placeholder=""/>
            <input class="input" type="date" name="dateModify" id="dateModify"/>
            <input class="input" type="number" name="durationModify" id="durationModify" placeholder=""/>
            <input class="input" type="number" name="noteModify" id="noteModify" placeholder=""/>
            <input type="text" name="synopsisModify" id="synopsisModify" placeholder=""/>
            <select class="input_select" name="genreModify" id="genreModify">
                <option value="">--Please choose a Gender--</option>
                <?php

                ?>
            </select>
            <a href="index.php?action=Add Gender"><span class="btnAddFilm">add</span></a>
            <select class="input_select" name="producerModify" id="producerModify">
                <option value="">--Please choose an producer--</option>
                <?php

                ?>
            </select>
            <a href="index.php?action=Add actor/producer"><span class="btnAddFilm">add</span></a>
            <input type="file" name="picture_film" id="picture_film">
            <input type="submit" value="add" id="modifyAdd"/>
            <input type="submit" value="remove" id="modifyRemove"/>
        </form>
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
    </div>
</div>
<?php

$title = "Modify Movie";
$content = ob_get_clean();
require("view/template.php");
?>