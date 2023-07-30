<?php
ob_start();
?>

<div>
    <span>FILM</span>
</div>

<?php
$title = "Films";
$content = ob_get_clean();
require "view/template.php";