<?php
/**
 * Propriétés propres à tous les controlleurs
 *
 * @author ROMAIN
 */
class Controller 
{
    public function render($view, array $parameters = array())
    {
        include "../src/Views/{$view}";
    }
}

?>
