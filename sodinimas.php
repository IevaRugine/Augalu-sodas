<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');


$store = new Sodas\Store('augalas');

//SODINIMO SCENARIJUS
if (isset($_POST['agurkas'])) {
    $augaloObj = new Sodas\Agurkas($store->getNewId());
    $store->addNew($augaloObj);
    Sodas\App::redirect('sodinimas');
}


if (isset($_POST['pomidoras'])) {
    $augaloObj = new Sodas\Pomidoras($store->getNewId());
    $store->addNew($augaloObj);
    Sodas\App::redirect('sodinimas');
}


//ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {
    $store->remove($_POST['rauti']);
    Sodas\App::redirect('sodinimas');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SODINIMAS</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <aside class="left">
    </aside>
    <header class="head">
        <div class="sticky meniu">
            <button onclick="window.location.href='http://localhost/bla/agurkai/sodinimas';">EITI SODINTI</button>
            <button onclick="window.location.href='http://localhost/bla/agurkai/auginimas';">EITI AUGINTI</button>
            <button onclick="window.location.href='http://localhost/bla/agurkai/skynimas';">EITI NUIMTI DERLIŲ</button>
        </div>
        <div class="title">
            <h1>AUGALŲ SODAS</h1>
            <h3>Sodinimas</h3>
        </div>
    </header>

    <main class="main">
        <form action="<?= URL . 'sodinimas' ?>" method="post">
            <?php foreach ($store->getall() as $augalas) : ?>
                <?php if ($augalas instanceof Sodas\Agurkas) : ?>
                    <div class="items ">
                        <img class="img" src="<?= $augalas->foto ?>" alt="Agurkas">
                        <div class="info">
                            Agurko nr. <?= $augalas->id ?>
                            Agurkų kiekis: <?= $augalas->count ?>
                        </div>
                        <button class="btn" type="submit" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>
                    </div>
                <?php else : ?>

                    <div class="items ">
                        <img class="img" src="<?= $augalas->foto ?>" alt="Pomidoras">
                        <div class="info">
                            Pomidoro nr. <?= $augalas->id ?>
                            Pomidorų kiekis: <?= $augalas->count ?>
                        </div>
                        <button type="submit" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
            <div class="footer">
                <button type="submit" name="agurkas">SODINTI AGURKĄ</button>
                <button type="submit" name="pomidoras">SODINTI POMIDORĄ</button>
            </div>
        </form>

    </main>
    <aside class="right">
    </aside>
</body>

</html>

<?php
// include __DIR__ . '/inc/Sodas.php';
// include __DIR__ . '/inc/Augalas.php';
// include __DIR__ . '/inc/Agurkas.php';
// include __DIR__ . '/inc/Pomidoras.php';
// use Tomato\Pomidoras;
// use Cucumber\Agurkas;
// if (!isset($_SESSION['obj'])) {
//     $_SESSION['augalu ID'] = 0;
// }
// //SODINIMO SCENARIJUS
// if (isset($_POST['agurkas'])) {
//     $augaloObj = new Sodas\Agurkas($_SESSION['augalu ID']);
//     $_SESSION['obj'][] = serialize($augaloObj);
//     $_SESSION['augalu ID']++;

//     header('Location:' . URL . 'sodinimas');
//     die;
// }