<?php
namespace src\Controllers;

use lib\Controller;
use src\Models\Pays;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $france = new Pays('France',10,5);
        $franceHEX = $france->generateHEX();
        echo $franceHEX;
        
        return $this->render('Default:map.php', array(
            'color' => $franceHEX,
        ));
    }
}

?>
