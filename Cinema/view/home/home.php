<?php
ob_start();
?>
<link rel="stylesheet" href="./public/css/style.css">

<div>
    <figure class="homeCaroussel">
        <img src="./public/img/barbie-film-margot-robbie-ryan-gosling-top.webp" alt="image film">
        <div class="title">
            <h1>cinema</h1>
            <h2>sql</h2>
        </div>
    </figure>
    <div class="boutonSwipe">
        <span class="boutonGauche">&#10094;</span>
        <span class="boutonDroit">&#10095;</span>
    </div>
    <div class="lastest">
        <h3>Lastest</h3>
    </div>
</div>

<?php
$title = "Home";
$content = ob_get_clean();
require("view/template.php");
?>
