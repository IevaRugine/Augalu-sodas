<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');


$store = new Sodas\Store('augalas');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DERLIUS NUIMTAS</title>
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
            <h3>Derliaus nuėmimas</h3>
    </header>
    <main class="main">
        <h1 class="sveikinu">SVEIKINU, VISAS DERLIUS NUIMTAS</h1>

        <h3 class="nuimtas">EIK SODINTI :) </h3>

        <button onclick="window.location.href='http://localhost/bla/agurkai/sodinimas';">EITI SODINTI</button>
    </main>
</body>

</html>