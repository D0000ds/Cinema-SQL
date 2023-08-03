<?php
ob_start();
?>

<div>
    <span>détaile genre</span>
</div>

<?php
$title = "Detail gender";
$content = ob_get_clean();
require("view/template.php");
?>