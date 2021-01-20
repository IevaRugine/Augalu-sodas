<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKYNIMAS</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">

</head>


<body>
    <aside class="left">
    </aside>
    <header class="head">
        <div class="sticky meniu">
            <button class="nav" onclick="window.location.href='http://localhost/bla/agurkai/sodinimas';">EITI SODINTI</button>
            <button class="nav" onclick="window.location.href='http://localhost/bla/agurkai/auginimas';">EITI AUGINTI</button>
            <button class="nav" onclick="window.location.href='http://localhost/bla/agurkai/skynimas';">EITI NUIMTI DERLIŲ</button>
        </div>
        <div class="title">
            <h1>AUGALŲ SODAS</h1>
            <h3>Skynimas</h3>
        </div>
    </header>

    <main class="main">
        <form action="<?= URL . 'skynimas' ?>" method="post">
            <?php foreach ($store->getall() as $augalas) : ?>
                <div>
                    <img src="<?= $augalas->foto ?>" alt="Augalas">
                    Augalas nr. <?= $augalas->id ?>
                    Galima skinti: <?= $augalas->count ?>
                    <input type="text" name="minus">
                    <button type="submit" name="skinti" value=<?= $augalas->id ?>>SKINTI</button>
                    <button type="submit" name="visus" value=<?= $augalas->id ?>>SKINTI VISUS</button>
                </div>
            <?php endforeach ?>

            <button type="submit" name="nuimti">NUIMTI VISĄ DERLIŲ</button>
        </form>

    </main>
    <aside class="right">
    </aside>
</body>

</html>

<?php
