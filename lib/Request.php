<?php

namespace lib;

/**
 * Request se charge des requètes, à travailler
 *
 * @author ROMAIN
 */
class Request 
{
    /**
     * URI Requested
     * @var string 
     */
    private $path;
    
    /**
     * Method Requested
     * @var string 
     */
    private $method;
    

    public function __construct() 
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_SERVER['REQUEST_URI'];
    }
    
    
    /**
     * Retourne l'URL demandée
     * @return string The requested path
     */
    public function getPath()
    {
        $checkPath = explode('/', $this->path);
        
        if($checkPath[1] === 'app.php')
            $this->path = str_replace ('/app.php', '', $this->path);
        
        return $this->path;
    }
    
    /**
     * Vérifie le type de requète
     * @param string $test La valeur à tester
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
    
    /**
     * Vérifie l'existence d'une clé dans $_POST
     * @param mixed $key
     * @return boolean
     */
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
