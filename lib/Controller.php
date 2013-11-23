<?php
/**
 * Propriétés propres à tous les controlleurs
 *
 * @author ROMAIN
 */
namespace lib;

use lib\Request;
use lib\Templating;
use lib\Response;

abstract class Controller 
{
    private $request;
    
    
    protected function render($view, array $parameters = array())
    {
        $str = explode(':', $view);
        $path = __DIR__.'/../src/Views/'.strtolower($str[0]).'/'.$str[1];
        
        if(!file_exists($path))
        {
            throw new \RuntimeException("La template " . $path . " ext introuvable.");
        }
        
        $tpl = new Templating($path, $parameters);
        
        return new Response($tpl->renderPage());     
    }
    
    protected function getRequest()
    {
        return $this->request;
    }


    final public function execute(Request $request, $action)
    {
        $this->request = $request;
        
        $method = $action.'Action';
        
        if(!is_callable(array($this, $method)))
        {
            throw new \RuntimeException('Impossible de trouver la méthode ' . $method . ' dans le controlleur ' . get_class($this));
        }
        
        return $this->$method();
    }
}
?>
