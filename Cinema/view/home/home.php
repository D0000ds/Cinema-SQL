<?php
ob_start();
?>

<div>
    <span>home</span>
</div>

<?php
$title = "Home";
$content = ob_get_clean();
require("view/template.php");
?>
