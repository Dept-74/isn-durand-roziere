<?php

namespace lib;

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
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_SERVER['REQUEST_URI'];
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
        if(strtoupper($this->method) == strtoupper($test)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function postHas($key)
    {
        return isset($_POST[$key]);
    }
    
    public function getHas($key)
    {
        return isset($_GET[$key]);
    }
    
    
    
}

?>
