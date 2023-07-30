<?php
ob_start();
?>

<div>
    <span>genre</span>
</div>

<?php
$title = "Genres";
$content = ob_get_clean();
require("view/template.php");
?>
