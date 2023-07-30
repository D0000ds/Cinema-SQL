<?php
ob_start();
?>

<div>
    <span>add actor or realisateur</span>
</div>

<?php
$title = "Add actor/producer";
$content = ob_get_clean();
require("view/template.php");
?>