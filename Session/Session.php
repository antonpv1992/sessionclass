<?php

namespace Session;

Class Session
{

    //private $session = [];

    public function __construct()
    {
        session_start();
    }

    public function setKeyInSession($key, $value)
    {
        //$this->session[$key] = $value;
        $_SESSION[$key] = $value;
    }

    public function setArrayInSession($array)
    {
        foreach($array as $key => $value)
        {
            //$this->session[$key] = $value;
            $_SESSION[$key] = $value;
        }
    }

    public function getItem($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } 
        return false;
    }

    public function getItems()
    {
        return $_SESSION;
    }

    public function sessionCLean()
    {
        session_unset();
        session_destroy();
        setcookie(session_name(), session_id(), time()-3600);
    }
}