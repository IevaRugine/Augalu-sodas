<?php
session_start();    // <------------- padarytas iki pirmo echoinimo
//session_unset();
include __DIR__ . '/Agurkas.php';
include __DIR__ . '/Pomidoras.php';

if (!isset($_SESSION['a'])) {
    //$_SESSION['a'] = [];
    $_SESSION['obj'] = [];   // <------agurko objektai
    $_SESSION['augalu ID'] = 0;
    //$_SESSION['agurko foto'] = [];
}


$agurkuSodas = ['pirmas.jpg', 'antras.jpg', 'trecias.jpg'];
$pomidoruSodas = ['pirma.jpg', 'antra.jpg', 'trecia.jpg'];

//SODINIMO SCENARIJUS
if (isset($_POST['sodinti'])) {
    $kasodinti = rand(1, 2);
    if ($kasodinti == 1) {
        $agurkoObj = new Agurkas($_SESSION['augalu ID'], $agurkuSodas);
        $_SESSION['obj'][] = serialize($agurkoObj);
        $_SESSION['augalu ID']++;

        // $_SESSION['a'][] = [
        //     'id' =>  ++$_SESSION['agurku ID'],
        //     'agurkai' => 0,
        //     'agurko foto' => $agurkuSodas[0],

        // ];

        header('Location: http://localhost/bla/agurkai/sodinimas.php');
        die;
    } else {

        $pomidoroObj = new Pomidoras($_SESSION['augalu ID'], $pomidoruSodas);
        $_SESSION['obj'][] = serialize($pomidoroObj);
        $_SESSION['augalu ID']++;

        header('Location: http://localhost/bla/agurkai/sodinimas.php');
        die;
    }
}

//ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {
    // foreach ($_SESSION['a'] as $index => $agurkas) {
    //     if ($_POST['rauti'] == $agurkas['id']) {
    //         unset($_SESSION['a'][$index], $_SESSION['obj'][$index]);
    //         header('Location: http://localhost/bla/agurkai/sodinimas.php');
    //         die;
    //     }
    // }

    foreach ($_SESSION['obj'] as $index => $agurkas) {
        $agurkas = unserialize($agurkas);
        if ($_POST['rauti'] == $agurkas->id) {
            unset($_SESSION['obj'][$index]);
            header('Location: http://localhost/bla/agurkai/sodinimas.php');
            die;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SODINIMAS</title>
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
    <h3>Augalų sodinimas</h3>

    <form action="" method="post">
        <?php foreach ($_SESSION['obj'] as $augalas) : ?>
            <?php $augalas = unserialize($augalas) ?>
            <div>
                <img src="<?= $augalas->foto ?>" alt="Augalas">
                Augalo nr. <?= $augalas->id ?>
                Augalų: <?= $augalas->count ?>
                <button type="submit" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>

            </div>
        <?php endforeach ?>
        <button type="submit" name="sodinti">SODINTI</button>
    </form>

</body>

</html>