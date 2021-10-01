<?php

namespace Session;

Class Session
{

    private $session = [];

    public function __construct()
    {
        //session_start();
    }

    public function setItem($key, $value)
    {
        $this->session[$key] = $value;
    }

    public function setItems($array)
    {
        foreach($array as $key => $value)
        {
            $this->session[$key] = $value;
        }
    }

    public function getItem($key)
    {
        if(isset($this->session[$key])){
            return $this->session[$key];
        } 
        return false;
    }

    public function getItems()
    {
        return $this->session;
    }

    public function sessionCLean()
    {
        $this->session = [];
    }
}