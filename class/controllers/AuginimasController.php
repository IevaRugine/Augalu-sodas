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



class AuginimasController
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
        include DIR . '/views/index_Auginimas.php';
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
        include DIR . '/views/list_Auginimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }

    // AUGINIMO SCENARIJUS
    public function grow()
    {

        $this->store->grow();

        ob_start();
        $store = $this->store;
        include DIR . '/views/list_Auginimas.php';
        $out = ob_get_contents();
        ob_end_clean();

        $json = ['list' => $out];

        $response = new JsonResponse($json);

        $response->prepare(App::$request);

        return $response;
    }
}

//if (isset($_POST['auginti'])) {
// include __DIR__ . '/Augalas.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Pomidoras.php';


// if (!isset($_SESSION['a'])) {
//     $_SESSION['a'] = [];
//     $_SESSION['augalu ID'] = 0;
//     //$_SESSION['agurko foto'] = [];
// }
// if (!isset($_SESSION['obj'])) {
//     $_SESSION['augalu ID'] = 0;
// }

    // foreach ($_SESSION['a'] as $index => &$agurkas) {
    //     $agurkas['agurkai'] += $_POST['kiekis'][$agurkas['id']];
    // }
    // unset($agurkas);
    // foreach ($_SESSION['obj'] as $index => $augalas) {  //<--- sereializuotas stringas
    //     $augalas = unserialize($augalas);  //<-------agurko objektas
    //     $augalas->addAugalas(); //<---pridedam agutka
    //     $augalas = serialize($augalas);   //<---------vel stringas
    //     $_SESSION['obj'][$index] = $augalas; // <--------ishsaugom agurkus
    // }
    // // _d($_POST['kiekis']);
    // header('Location: http://localhost/bla/agurkai/auginimas.php');
    // exit;