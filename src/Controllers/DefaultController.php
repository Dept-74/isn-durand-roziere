<?php
namespace src\Controllers;

use lib\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {     
        return $this->render('Default:map.php', array(
            'test' => "It work's",
        ));
    }
}

?>
