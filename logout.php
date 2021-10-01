<?php

const DS = DIRECTORY_SEPARATOR;
define("ROOT", str_replace("\\", DS, __DIR__));

spl_autoload_register(
    function ($class) {
        $file = ROOT . DS . str_replace('\\', DS, $class) . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }
);

use Session\Session;

$session = new Session();

if(isset($_POST['logout'])){
    $session->sessionClean();
    header('Location: http://sessionclass.loc/index.php');
}