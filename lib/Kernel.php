<?php
namespace lib;

use lib\Request;
use lib\Response;
/**
 * TODO : Ajouter au patt singleton en vf
 */
class Kernel
{
    /**
     * Contient la map de routing
     * @var Array Liste des routes
     */
    private $routes;
    
    /**
     * Requete en cours
     * @var lib\Request
     */
    private $request;
    
    
    public function __construct() {        
        //Routing suffisant pour le moment (à externaliser en vf)
        $this->routes = array(
            'index_home' => array(
                '/',
                'Default:index',
            ),
            'generate_bdd' => array(
                '/generate_bdd',
                'Default:generate',
            ),
            'add_vote' => array(
                '/add-vote',
                'Default:add',
            ),
        );      
    }
    
    public function handle(Request $request)
    {
        $this->request = $request;
        
        $controller = $this->getController();
       
        
        $response = $controller['controller']->execute($this->request, $controller['action']);     
       
        
        if($response instanceof Response)
        {
             $response->send();
        }        
        throw new \InvalidArgumentException('Le controlleur doit retourner un objet Response.');      
    }
    
    private function getController()
    {
        foreach($this->routes as $key => $value) {
            if(in_array($this->request->getPath(), $value))
            {
                return $this->generateControllerCall($value['1']);
            }            
        }
        throw new \RuntimeException('Aucune route correspondante pour : '. $this->request->getPath());
    }
    
    private function generateControllerCall($key)
    {
        $action = explode(':', $key);
        
        return array(
            'controller' => new \src\Controllers\DefaultController(),
            'action' => $action[1],
        );
    }
    
    
}

?>