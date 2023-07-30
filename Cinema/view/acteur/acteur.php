<?php
ob_start();
?>

<div>
    <span>acteurs</span>
</div>

<?php
$title = "Acteurs";
$content = ob_get_clean();
require "view/template.php";