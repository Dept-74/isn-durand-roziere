<?php
namespace lib;

/**
 * Description of Templating
 *
 * @author Benjamin
 */

class Templating {
    
    private $file;
    private $parameters;
    
    public function __construct($file, array $parameters = array())
    {
        $this->file = $file;
        $this->parameters = $parameters;
    }


    public function renderPage()
    {
        extract($this->parameters);
        
        ob_start();
        include $this->file;
        return ob_get_clean();
    }
}

?>
