<?php

if(isset($_POST['logout'])){
    $session->clean();
    header('Location: http://session.loc/');
}