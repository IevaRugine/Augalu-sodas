<?php

namespace Sodas;

class App
{

    // Router
    public static function route()
    {
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri); // <--- masyvas su duomenum is uri eilutes

        if ('sodinimas' == $uri[0]) {
            include DIR . '/sodinimas.php';
        } elseif ('auginimas' == $uri[0]) {
            include DIR . '/auginimas.php';
        } elseif ('skynimas' == $uri[0]) {
            include DIR . '/skynimas.php';
        } elseif ('nuimtas' == $uri[0]) {
            include DIR . '/nuimtas.php';
        }
    }

    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        exit;
    }
}
