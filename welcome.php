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

$email = "admin@admin.loc";
$password = "pass";

var_dump($session->getKeyFromSession('password'));

if($session->getKeyFromSession('email') === $email && $session->getKeyFromSession('password') === $password) {
    echo "Hello Admin!";
} else {
    echo "You not registrated";
    header('Location: http://sessionclass.loc/index.php');
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
  <title>SessionClassLogout</title>
</head>
<body>
    <form action="/logout.php" method="post">
        <input type="submit" name="logout">
    </form>
</body>
</html>