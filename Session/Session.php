<?php

namespace Session;

Class Session
{

    public function __construct()
    {
        $this->checkUser();
    }

    public function run()
    {
        session_start();
        $_SESSION['agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 
    }

    public function setKeyInSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getKeyFromSession($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } 
        return false;
    }

    public function getAllSession()
    {
        return $_SESSION;
    }

    public function removeKeyFromSession($key)
    {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public function sessionCLean()
    {
        session_unset();
        session_destroy();
        setcookie(session_name(), session_id(), time()-3600);
    }

    public function checkUser()
    {
        if( !empty($_SESSION)
            || $_SESSION['agent'] !== $_SERVER['HTTP_USER_AGENT'] 
            || $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'])
            {
                $this->sessionCLean();
            }       
        $this->run();    
    }
}