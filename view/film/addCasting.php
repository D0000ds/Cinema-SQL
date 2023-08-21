<?php
ob_start();
?>

<div>
    <h3 class="title-add-actor-or-rea">add casting</h3>
    <form action="" method="post">
        <select name="" id="" value="">
            <option value="">--Please choose a Actor--</option>
        </select>
        <select name="" id="" value="">
            <option value="">--Please choose a Role--</option>
        </select>
        <a href=""><span>add</span></a>
        <input type="submit" value="add" id=""/>
    </form>
</div>

<?php
$title = "Add Casting";
$content = ob_get_clean();
require("view/template.php");
?>