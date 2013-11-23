<?php

namespace lib;

class Kernel
{
    private $routes;
    
    public function __construct() {        
        //Routing suffisant pour le moment (à externaliser en vf)
        $routes = array(
            'index_home' => array(
                '/map',
                'Default:index',
            ),
        );
        
        
    }
    
    
}

?>