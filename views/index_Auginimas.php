<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/bla/agurkai/js/grow.js" defer></script>
      <script>
        const apiUrl = 'http://localhost/bla/agurkai/auginimas';
    </script>
  
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
    <body>
    <main>

            <div id="growList" class="growList"></div>
            <button type="submit" name="auginti" id="auginti">Auginti</button>
  
    </main>
    <aside class="desine">
    </aside>

</body>

</html>

<?php


