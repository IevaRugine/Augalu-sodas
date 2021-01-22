<?php

namespace Sodas;

use Sodas\Controllers\SodinimasController;
use Sodas\Controllers\AuginimasController;
use Sodas\Controllers\SkynimasController;
use Symfony\Component\HttpFoundation\Request;

class App
{
    public static $request;

    private static $storeSetting = 'db'; //gali buti dvieju rusiu - JSON or DB

    public static function start()
    {
        self::$request = Request::createFromGlobals();

        return self::route();
    }


    public static function store($type)     //<--- factory gamins json store objektus
    {
        if ('json' == self::$storeSetting) {
            return new JsonStore($type);
        }
        if ('db' == self::$storeSetting) {
            return new DbStore($type);
        }
    }

    // Router
    public static function route()
    {
        // pasalinam folderi is duomenu ---------------------------------
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri); // <--- masyvas su duomenum is uri eilutes

        if ('sodinimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new SodinimasController)->index();
            }
            if ('list' == $uri[1]) {
                return (new SodinimasController)->list();
            }
            if ('remove' == $uri[1]) {
                return (new SodinimasController)->remove();
            }
            if ('plantCucumber' == $uri[1]) {
                return (new SodinimasController)->plantCucumber();
            }
            if ('plantTomato' == $uri[1]) {
                return (new SodinimasController)->plantTomato();
            }
        }
        if ('auginimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new AuginimasController)->index();
            }
            if ('growList' == $uri[1]) {
                return (new AuginimasController)->list();
            }
            if ('grow' == $uri[1]) {
                return (new AuginimasController)->grow();
            }
        }

        if ('skynimas' == $uri[0]) {
            if (!isset($uri[1])) {
                return (new SkynimasController)->index();
            }
            if ('harvestList' == $uri[1]) {
                return (new SkynimasController)->list();
            }
            if ('pick' == $uri[1]) {
                return (new SkynimasController)->pick();
            }
            if ('pickAll' == $uri[1]) {
                return (new SkynimasController)->pickAll();
            }
            if ('harvest' == $uri[1]) {
                return (new SkynimasController)->harvest();
            }
        }
        //gera vieta prideti 404 puslapi
    }
    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        exit;
    }
}



        // elseif ('harvest' == $uri[1]) {
        //     return (new SkynimasController)->harvest();
        // }      
        // elseif ('done' == $uri[1]) {
        //     return (new SodinimasController)->done();
        // }  

        //     } elseif ('auginimas' == $uri[0]) {
        //         return DIR . '/auginimas.php';
        //     } elseif ('skynimas' == $uri[0]) {
        //         return DIR . '/skynimas.php';
        //     } elseif ('nuimtas' == $uri[0]) {
        //         return DIR . '/nuimtas.php';
        //     }
        //     
        // }