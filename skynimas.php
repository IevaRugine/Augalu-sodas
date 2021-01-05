<?php
session_start();
//session_unset();
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = [];
    $_SESSION['agurku ID'] = 0;
    $_SESSION['agurko foto'] = [];
}

include __DIR__ . '/Agurkas.php';

//SKINIMO SCENARIJUS
if (isset($_POST['skinti'])) {
    foreach ($_SESSION['a'] as $i => $agurkas) {
        if ($_POST['skinti'] == $agurkas['id']) {
            $_SESSION['a'][$i]['agurkai'] -= $_POST['minus'];
            header('Location: http://localhost/bla/agurkai/skynimas.php');
            die;
        }
    }
}

//VISUS SKINTI SCENARIJUS
if (isset($_POST['visus'])) {
    foreach ($_SESSION['a'] as $i => $agurkas) {
        if ($_POST['visus'] == $agurkas['id']) {
            $_SESSION['a'][$i]['agurkai'] -= $_SESSION['a'][$i]['agurkai'];
            unset($_SESSION['a'][$i]);
            header('Location: http://localhost/bla/agurkai/skynimas.php');
            die;
        }
    }
}


//NUIMTI visa derliu
if (isset($_POST['nuimti'])) {
    foreach ($_SESSION['a'] as $index => $agurkas) {
        unset($_SESSION['a']);
        header('Location: http://localhost/bla/agurkai/nuimtas.php');
        die;
    }
}

if (isset($_POST['nuimti'])) {
    foreach ($_SESSION['a'] as $index => $agurkas) {
Agurkas::nuimtiDerliu()

        unset($_SESSION['a']);
        header('Location: http://localhost/bla/agurkai/nuimtas.php');
        die;
    }
}


$agurkuSodas = ['pirmas.jpg', 'antras.jpg', 'trecias.jpg'];

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

    <h1>AGURKŲ SODAS</h1>
    <h3>Derliaus nuėmimas</h3>

    <!-- <form action="" method="post"> -->
    <?php foreach ($_SESSION['a'] as $agurkas) : ?>
        <div>
            <img src="<?= $agurkas['agurko foto'] ?>" alt="Agurkas">
            Agurkas nr. <?= $agurkas['id'] ?>
            Galima skinti: <?= $agurkas['agurkai'] ?>
            <form action="" method="post">
                <input type="text" name="minus">
                <button type="submit" name="skinti" value=<?= $agurkas['id'] ?>>SKINTI</button>
            </form>
            <form action="" method="post">
                <button type="submit" name="visus" value=<?= $agurkas['id'] ?>>SKINTI VISUS</button>
            </form>
        </div>
    <?php endforeach ?>
    <form action="" method="post">
        <button type="submit" name="nuimti">NUIMTI VISĄ DERLIŲ</button>
    </form>
    <!-- </form> -->

</body>

</html>