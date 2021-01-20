<?php

namespace Sodas;

use Sodas\Controllers\SodinimasController;
use Symfony\Component\HttpFoundation\Request;

class App
{
    public static $request;

    public static function start()
    {
        self::$request = Request::createFromGlobals();

        return self::route();
    
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
            //gera vieta prideti 404 puslapi

        } 
        elseif ('auginimas' == $uri[0]) {
            return DIR . '/auginimas.php';
        } elseif ('skynimas' == $uri[0]) {
            return DIR . '/skynimas.php';
        } elseif ('nuimtas' == $uri[0]) {
            return DIR . '/nuimtas.php';
        }
        // _dd("nera aprašyta tokio scenarijaus App::route() metode"); die;
        //return "nera aprašyta tokio scenarijaus App::route() metode";
    }

    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        exit;
    }
}
