<?php
defined('DOOR_BELL') || die('Įėjimas tik pro duris');
$store = new Sodas\Store('augalas');


// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {

    $store->grow();
    Sodas\App::redirect('auginimas');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUGINIMAS</title>
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
            <h3>Auginimas</h3>
        </div>
    </header>

    <main>
        <form action="<?= URL . 'auginimas' ?>" method="post">
            <?php foreach ($store->getall() as $augalas) : ?>
                <?php //$augalas = unserialize($augalas)
                ?>
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
    </main>
    <aside class="desine">
    </aside>

</body>

</html>

<?php
// include __DIR__ . '/Augalas.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Pomidoras.php';


// if (!isset($_SESSION['a'])) {
//     $_SESSION['a'] = [];
//     $_SESSION['augalu ID'] = 0;
//     //$_SESSION['agurko foto'] = [];
// }
// if (!isset($_SESSION['obj'])) {
//     $_SESSION['augalu ID'] = 0;
// }

    // foreach ($_SESSION['a'] as $index => &$agurkas) {
    //     $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    // }
    // unset($agurkas);
    // foreach ($_SESSION['obj'] as $index => $augalas) {  //<--- sereializuotas stringas
    //     $augalas = unserialize($augalas);  //<-------agurko objektas
    //     $augalas->addAugalas(); //<---pridedam agutka
    //     $augalas = serialize($augalas);   //<---------vel stringas
    //     $_SESSION['obj'][$index] = $augalas; // <--------ishsaugom agurkus
    // }
    // // _d($_POST['kiekis']);
    // header('Location: http://localhost/bla/agurkai/auginimas.php');
    // exit;