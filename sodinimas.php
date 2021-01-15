<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');


$store = new Sodas\Store('augalas');


if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);

    // LISTo SCENARIJUS
    if (isset($rawData['list'])) {
        // sleep(3);
        ob_start();
        include __DIR__ . '/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }


    //SODINIMO SCENARIJUS
    elseif (isset($rawData['sodintiAgurka'])) {
        $kiekis = (int) $rawData['kiekis'];

        $kiekis = $kiekis ? $kiekis : 1;

        if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) {
                $error = 1; // <-- neigiamas agurku kiekis
            } elseif (4 < $kiekis) {
                $error = 2; // <-- per daug
            }

            ob_start();
            include __DIR__ . '/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }


        foreach (range(1, $kiekis) as $_) {
            $augaloObj = new Sodas\Agurkas($store->getNewId());
            $store->addNew($augaloObj);
        }

        ob_start();
        include __DIR__ . '/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    } elseif (isset($rawData['sodintiPomidora'])) {
        $kiekis = (int) $rawData['kiekis'];
        $kiekis = $kiekis ? $kiekis : 1;

        if (0 > $kiekis || 4 < $kiekis) { // <--- validacija
            if (0 > $kiekis) {
                $error = 1; // <-- neigiamas agurku kiekis
            } elseif (4 < $kiekis) {
                $error = 2; // <-- per daug
            }
            ob_start();
            include __DIR__ . '/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }


        foreach (range(1, $kiekis) as $_) {
            $augaloObj = new Sodas\Pomidoras($store->getNewId());
            $store->addNew($augaloObj);
        }

        ob_start();
        include __DIR__ . '/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }




    //ISROVIMO SCENARIJUS
    if (isset($rawData['rauti'])) {
        $store->remove($rawData['id']);

        ob_start();
        include __DIR__ . '/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
}



?>
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