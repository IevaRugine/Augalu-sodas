<?php
session_start();

include __DIR__ . '/Agurkas.php';
include __DIR__ . '/Pomidoras.php';



if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['augalu ID'] = 0;
    //$_SESSION['agurko foto'] = [];
}

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {

    // foreach ($_SESSION['a'] as $index => &$agurkas) {
    //     $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    // }
    // unset($agurkas);

    foreach ($_SESSION['obj'] as $index => $augalas) {  //<--- sereializuotas stringas
        $augalas = unserialize($augalas);  //<-------agurko objektas
        $augalas->addAugalas(); //<---pridedam agutka
        $augalas = serialize($augalas);   //<---------vel stringas
        $_SESSION['obj'][$index] = $augalas; // <--------ishsaugom agurkus
    }



    // _d($_POST['kiekis']);
    header('Location: http://localhost/bla/agurkai/auginimas.php');
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUGINIMAS</title>
</head>

<style>
    img {
        max-width: 200px;
        max-height: 200 px;
    }
</style>

<body>

    <form action="http://localhost/bla/agurkai/sodinimas.php" method="get">
        <button type="submit" name="seti">EITI SODINTI</button>
    </form>
    <form action="http://localhost/bla/agurkai/auginimas.php" method="get">
        <button type="submit" name="augti">EITI AUGINTI</button>
    </form>
    <form action="http://localhost/bla/agurkai/skynimas.php" method="get">
        <button type="submit" name="nuimt">EITI NUIMTI DERLIŲ</button>
    </form>


    <h1>SODAS</h1>
    <h3>Auginimas</h3>
    <form action="" method="post">
        <?php foreach ($_SESSION['obj'] as $augalas) : ?>
            <?php $augalas = unserialize($augalas) ?>
            <div>
                <img src="<?= $augalas->foto ?>" alt="Agurkas">
                <?php $augalas->plius ?>
                <h1 style="display:inline;"><?= $augalas->count ?></h1>
                <h3 style="display:inline;color:red;">+<?= $augalas->plius ?></h3>

                <input type="hidden" name="kiekis[<?= $augalas->id ?>]" value="<?= $augalas->plius ?>">

                Augalo Nr. <?= $augalas->id ?>
            </div>
        <?php endforeach ?>
        <button type="submit" name="auginti">Auginti</button>
    </form>
</body>

</html>