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
        if($this->method == $test) {
            return true;
        }
        else {
            return false;
        }
    }
    
}

?>
