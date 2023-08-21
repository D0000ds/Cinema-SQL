<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
</head>
<body>
    <div>
        <header>
            <nav id="nav">
                <figure class="figure_dvd">
                    <a href="index.php">
                        <img src="./public/img/dvd-logo.png" alt="logo DVD">
                    </a>
                </figure>
                <div class="mobile" id="mobile">
                    <ul>
                        <li>
                            <a href="index.php?action=Genres">Genres</a>
                        </li>
                        <li>
                            <a href="index.php?action=Acteurs">Acteurs</a>
                        </li>
                        <li>
                            <a href="index.php?action=Realisateurs">Realisateurs</a>
                        </li>
                        <li>
                            <a href="index.php?action=Films">Films</a>
                        </li>
                    </ul>
                    <div class="button_add" id="button_id">
                        <a href="index.php?action=Add actor/producer">Add actor/producer</a>
                        <a href="index.php?action=Add film">Add film</a>
                    </div>
                </div>
                <div class="admin">
                    <figure class="figure_user">
                        <span>admin</span>
                        <img src="./public/img/user.png" alt="logo user">
                    </figure>
                </div>
                <div id="icons"></div>
                <div id="iconsClose"></div>
            </nav>
            <script src="./public/Js/script.js"></script>
        </header>
        <main>
            <?= $content ?>
        </main>
    </div>
</body>
</html>