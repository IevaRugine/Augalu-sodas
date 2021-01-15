<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');


$store = new Sodas\Store('augalas');



//SKINIMO SCENARIJUS
if (isset($_POST['skinti'])) {
    $store->pick($_POST['skinti']);
    Sodas\App::redirect('skynimas');
}



//VISUS SKINTI SCENARIJUS
if (isset($_POST['visus'])) {
    $store->pickAll($_POST['visus']);
    Sodas\App::redirect('skynimas');
}



//NUIMTI visa derliu
if (isset($_POST['nuimti'])) {
    $store->harvestAll();
    Sodas\App::redirect('nuimtas');
}




?>
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
// include __DIR__ . '/Augalas.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Pomidoras.php';

// use Cucumber\Agurkas;
// use Tomato\Pomidoras;


// if (!isset($_SESSION['obj'])) {
//     $_SESSION['augalu ID'] = 0;
// }
