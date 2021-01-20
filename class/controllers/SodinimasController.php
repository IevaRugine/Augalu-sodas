<?php

//defined('DOOR_BELL') || die('Įėjimas tik pro duris');

namespace Sodas\Controllers;

use Sodas\Store;
use Sodas\Augalas;
use Sodas\Agurkas;
use Sodas\Pomidoras;
use Sodas\App;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class SodinimasController
{

    private $store, $rawData;


    public function __construct()
    {

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->store = new Store('augalas');
            $this->rawData = App::$request->getContent(); // <--- SYMFONY :)
            $this->rawData = json_decode($this->rawData, 1);
        }
    }


    //SODINIMO PUSLAPIO RODYMO SCENARIJUS
    public function index()
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR . '/views/index_Sodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        // setinam contenta ---------------------------------
        $response->setContent($out);
        // paruosiam ----------------------------------------
        $response->prepare(App::$request);
        // grazinam response tam kas ji iskviete ------------
        return $response;
    }


    // LISTo SCENARIJUS
    public function list()
    {
        //kreipiames i views ir perduodam kintamuosius
        $store = new Store('augalas'); //negraziai apiformintas kintamojo perdavimas i views

        ob_start();
        include DIR . '/views/list_Sodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }


    //SODINIMO SCENARIJUS
    public function plantCucumber()
    {

        $kiekis = (int) $this->rawData['kiekis'];
        $kiekis = $kiekis ? $kiekis : 1;

        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) {
                $error = 1;
            } elseif (4 < $kiekis) {
                $error = 2;
            }
            ob_start();
            include DIR . '/views/error.php';
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
            $augaloObj = new Agurkas($this->store->getNewId());
            $this->store->addNew($augaloObj);
        }

        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Sodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }



    public function plantTomato()
    {

        $kiekis = (int) $this->rawData['kiekis'];
        $kiekis = $kiekis ? $kiekis : 1;

        if (0 > $kiekis || 4 < $kiekis) {
            if (0 > $kiekis) {
                $error = 1;
            } elseif (4 < $kiekis) {
                $error = 2;
            }
            ob_start();
            include DIR . '/views/error.php';
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
            $augaloObj = new Pomidoras($this->store->getNewId());
            $this->store->addNew($augaloObj);
        }

        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Sodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }


    //ISROVIMO SCENARIJUS
    public function remove()
    {

        $this->store->remove($this->rawData['id']);

        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Sodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }
}







  






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