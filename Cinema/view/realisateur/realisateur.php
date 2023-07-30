<?php
ob_start();
?>

<div>
    <span>realisateur</span>
</div>

<?php
$title = "Realisateurs";
$content = ob_get_clean();
require("view/template.php");
?>