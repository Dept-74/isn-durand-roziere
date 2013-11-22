<?php

namespace lib\Request;

/**
 * Request se charge des requètes, à travailler
 *
 * @author ROMAIN
 */
class Request 
{
    private $path;    
    private $method;
    
    public function __construct() 
    {
        if(isset($_GET)) {
            $this->method = 'get';
        }
        if(isset($_POST)) {
            $this->method = 'post';
        }
        if(isset($_SERVER)) {
            $this->method = 'server';
        }
        if(isset($_SESSION)) {
            $this->method = 'session';
        }
        //etc... methode lourde... à voir
    }


    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * 
     * @param Permet de s'assurer de la méthode utilisée.
     * @param GET POST etc...
     * @return boolean
     */
    public function isMethod($test) 
    {
        if(strtoupper($this->method) == $test) {
            return true;
        }
        else {
            return false;
        }
    }
    
}

?>
