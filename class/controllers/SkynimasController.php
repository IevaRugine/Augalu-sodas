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


class SkynimasController
{

    private $store, $rawData;


    public function __construct()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->store = App::store('augalas');
            $this->rawData = App::$request->getContent(); // <--- SYMFONY :)
            $this->rawData = json_decode($this->rawData, 1);
        }
    }


    //AUGINIMOS PUSLAPIO RODYMO SCENARIJUS
    public function index()
    {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR . '/views/index_Skynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $response->setContent($out);
        $response->prepare(App::$request);
        return $response;
    }


    // LISTO SCENARIJUS
    public function list()
    {
        //kreipiames i views ir perduodam kintamuosius
        $store = App::store('augalas'); //negraziai apiformintas kintamojo perdavimas i views

        ob_start();
        include DIR . '/views/list_Skynimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }

    //SKINTI PASIRINKA SKAICIU 

    public function pick()
    {
        $kiekis = (int) $this->rawData['kiek'];
        $this->store->pick($this->rawData['id'], $kiekis);

        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Skynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }


    // NUO VIENO AUGALO SKINTI VISUS  SCENARIJUS
    public function pickAll()
    {

        $this->store->pickAll($this->rawData['id']);
        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Skynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }



    //NUIMTI VISA DERLIU


    public function harvest()
    {
        $this->store->harvestAll();
        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Skynimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }
}


// include __DIR__ . '/Augalas.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Pomidoras.php';

// use Cucumber\Agurkas;
// use Tomato\Pomidoras;


// if (!isset($_SESSION['obj'])) {
//     $_SESSION['augalu ID'] = 0;
// }
