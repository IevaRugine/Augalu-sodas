<?php
session_start();
//session_unset();

include __DIR__ . '/Agurkas.php';
include __DIR__ . '/Pomidoras.php';

if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['augalu ID'] = 0;
}



//SKINIMO SCENARIJUS
if (isset($_POST['skinti'])) {
    // foreach ($_SESSION['a'] as $i => $augalas) {
    //     if ($_POST['skinti'] == $augalas['id']) {
    //         $_SESSION['a'][$i]['agurkai'] -= $_POST['minus'];
    //         header('Location: http://localhost/bla/agurkai/skynimas.php');
    //         die;
    //     }
    // }


    foreach ($_SESSION['obj'] as $i => $augalas) {
        $augalas = unserialize($augalas);
        if ($_POST['skinti'] == $augalas->id) {
            $augalas->skintiAugalas($_POST['minus']);
            $augalas = serialize($augalas);   //<---------vel stringas
            $_SESSION['obj'][$i] = $augalas; // <--------ishsaugom agurkus
            header('Location: http://localhost/bla/agurkai/skynimas.php');
            die;
        }
    }
}



//VISUS SKINTI SCENARIJUS
if (isset($_POST['visus'])) {
    //     foreach ($_SESSION['a'] as $i => $agurkas) {
    //         if ($_POST['visus'] == $agurkas['id']) {
    //             $_SESSION['a'][$i]['agurkai'] -= $_SESSION['a'][$i]['agurkai'];
    //             unset($_SESSION['a'][$i]);
    //             header('Location: http://localhost/bla/agurkai/skynimas.php');
    //             die;
    //         }
    //     }
    // }


    foreach ($_SESSION['obj'] as $i => $augalas) {
        $augalas = unserialize($augalas);
        if ($_POST['visus'] == $augalas->id) {
            $augalas->nuskintiVisus();
            $augalas = serialize($augalas);   //<---------vel stringas
            $_SESSION['obj'][$i] = $augalas; // <--------ishsaugom agurkus
            header('Location: http://localhost/bla/agurkai/skynimas.php');
            die;
        }
    }
}



//NUIMTI visa derliu
if (isset($_POST['nuimti'])) {
    //     foreach ($_SESSION['a'] as $index => $agurkas) {
    //         unset($_SESSION['a']);
    //         header('Location: http://localhost/bla/agurkai/nuimtas.php');
    //         die;
    //     }
    // }


    foreach ($_SESSION['obj'] as $index => $augalas) {
        $augalas = unserialize($augalas);
        Agurkas::nuimtiDerliu($_SESSION['obj']);
        Pomidoras::nuimtiDerliu($_SESSION['obj']);
        $augalas = serialize($augalas);
        //session_unset();
        header('Location: http://localhost/bla/agurkai/nuimtas.php');
        die;
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKYNIMAS</title>
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
    <h3>Derliaus nuėmimas</h3>

    <!-- <form action="" method="post"> -->
    <?php foreach ($_SESSION['obj'] as $augalas) : ?>
        <?php $augalas = unserialize($augalas) ?>
        <div>
            <img src="<?= $augalas->foto ?>" alt="Augalas">
            Augalas nr. <?= $augalas->id ?>
            Galima skinti: <?= $augalas->count ?>
            <form action="" method="post">
                <input type="text" name="minus">
                <button type="submit" name="skinti" value=<?= $augalas->id ?>>SKINTI</button>
            </form>
            <form action="" method="post">
                <button type="submit" name="visus" value=<?= $augalas->id ?>>SKINTI VISUS</button>
            </form>
        </div>
    <?php endforeach ?>
    <form action="" method="post">
        <button type="submit" name="nuimti">NUIMTI VISĄ DERLIŲ</button>
    </form>
    <!-- </form> -->

</body>

</html>