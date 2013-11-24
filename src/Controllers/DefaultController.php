<?php
namespace src\Controllers;

use lib\Controller;
use src\Models\Pays;
use src\Models\PaysManager;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //Attention zone de test ! :D
        //Et oublie pas d'importer le SQL le ben ;)
        $france = new Pays('France',10,5);
        $franceHEX = $france->generateHEX();
        
        $db = new \PDO('mysql:host=localhost;dbname=worldsmood', 'root', '');
        $manager = new PaysManager($db);
        // $manager->add($france);
        $france->addPoints(2);
        echo $france->getPoints();
        echo $france->getVotes();
        
        return $this->render('Default:map.php', array(
            'color' => $franceHEX,
        ));
    }
}

?>
