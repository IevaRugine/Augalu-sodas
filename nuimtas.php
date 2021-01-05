<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUIMTAS</title>
</head>

<style>
    .sveikinu {
        color: green;
        font-size: bold;
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

    <h1 class="sveikinu">SVEIKINU, VISAS DERLIUS NUIMTAS</h1>
    <h3>EIK SODINTI :) </h3>

    <form action="http://localhost/bla/agurkai/sodinimas.php" method="post">
        <button type="submit" name="seti">EITI SODINTI</button>
    </form>

</body>

</html>