<?php
ob_start();
?>

<div>
    <span>add film</span>
</div>

<?php
$title = "Add film";
$content = ob_get_clean();
require("view/template.php");
?>
