<?php
ob_start();
?>

<div>
    <span>add Gender</span>
</div>

<?php
$title = "add Gender";
$content = ob_get_clean();
require("view/template.php");
?>