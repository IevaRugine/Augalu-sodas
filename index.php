<?php

use Sodas\App;

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/bla/agurkai/');
define('URL', 'http://localhost/bla/agurkai/');
define('DIR', __DIR__);


include __DIR__ . '/bootstrap.php';


App::start()->send();
