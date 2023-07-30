<?php
ob_start();
?>

<div>
    <span>add casting</span>
</div>

<?php
$title = "Add Casting";
$content = ob_get_clean();
require("view/template.php");
?>