<?php

const DS = DIRECTORY_SEPARATOR;
define("ROOT", str_replace("\\", DS, dirname(__DIR__)));

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

if(isset($_POST['email']) && isset($_POST['pass']) ){
    $session->setItems($_POST);
    //$session->setItem('email', $_POST['email']);
    //$session->setItem('password', $_POST['pass']);
}


?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no,
                 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SessionClassTest</title>
</head>
<body>
  <form action="/" method="post">
    <input type="email" name="email">
    <input type="password" name="pass">
    <input type="submit" name="button">
  </form>
</body>
</html>

