<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/bla/agurkai/app.js" defer></script>
    <script>
        const apiUrl = 'http://localhost/bla/agurkai/sodinimas';
    </script>
</head>
<title>SODINIMAS</title>
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
            <h3>Sodinimas</h3>
        </div>
    </header>

    <main class="main">
        <div id="error"></div>
        <form>
            <div id="list" class="list"></div>


            <div>
                <div class="planting">
                    <input type="text" name="kiekAgurku">
                    <input type="text" name="kiekPomidoru">

                </div>
                <div class="planting">
                    <button type="button" name="sodintiAgurka" id="sodintiAgurka">SODINTI AGURKĄ</button>
                    <button type="button" name="sodintiPomidora" id="sodintiPomidora">SODINTI POMIDORĄ</button>
                </div>
            </div>
        </form>
    </main>
    <aside class="right">
    </aside>


</body>

</html>