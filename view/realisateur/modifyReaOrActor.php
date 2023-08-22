<?php
ob_start();
?>
<div>
    <span>modify actor or rea</span>
</div>
<?php

$title = "Modify Actor or Producer";
$content = ob_get_clean();
require("view/template.php");
?>