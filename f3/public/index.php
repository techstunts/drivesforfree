<?php
$path_to_lib = __DIR__ . '/../lib';
set_include_path($path_to_lib . PATH_SEPARATOR . get_include_path());

$path_to_lib = __DIR__ . '/../thirdparty/google-api-php-client-read-only/src';
set_include_path($path_to_lib . PATH_SEPARATOR . get_include_path());


if (!defined('APPLICATION_FOLDER'))
    define('APPLICATION_FOLDER', __DIR__ . '/../dff');

if (!defined('THIRD_PARTY_FOLDER'))
    define('THIRD_PARTY_FOLDER', __DIR__ . '/../thirdparty');

$path_to_lib = APPLICATION_FOLDER . '/config';
set_include_path($path_to_lib . PATH_SEPARATOR . get_include_path());

require_once APPLICATION_FOLDER . '/config/config.php';

require_once 'base.php';

F3::set('AUTOLOAD', APPLICATION_FOLDER . '/modules/; ../thirdparty/google-api-php-client-read-only/src/');
F3::set('UI', APPLICATION_FOLDER . '/modules/');

F3::route('GET /', 'storageprovider\controllers\index->index');
F3::route('GET /oauth2callback?*', 'oauth2callback\controllers\googledrive->authenticate_response');
F3::run();

/*
    function home(){
        $g = new storageprovider\controllers\index;
        $g->index();
        //$u = new user\controllers\index;
        echo "Hello World!";
        echo Template::serve('storageprovider\views\list.html');
        echo F3::render('storageprovider\views\index.php');
    }
*/