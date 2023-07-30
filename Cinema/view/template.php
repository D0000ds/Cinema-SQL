<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <div class="container">
        <header>
            <figure class="figure_dvd">
                <a href="index.php">
                    <img src="./public/img/dvd-logo.png" alt="logo DVD">
                </a>
            </figure>
            <nav id="nav">
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
            </nav>
            <div class="button_add">
                <a href="index.php?action=Add actor/producer">Add actor/producer</a>
                <a href="index.php?action=Add Casting">Add casting</a>
                <a href="index.php?action=Add film">Add film</a>
            </div>
            <figure class="figure_user">
                <span>admin</span>
                <img src="./public/img/user.png" alt="logo user">
            </figure>
            <div id="icons"></div>
            <script src="./public/Js/script.js"></script>
        </header>
        <main>
            <?= $content ?>
        </main>
    </div>
</body>
</html>