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
        
        $bdd = new \PDO('mysql:host=localhost;dbname=worldsmood', 'root', '');
        
        /* $france = new Pays('FR','France',0,0);
        $france->restartPoints();
        $france->setVotes(0);
        
        $em = new PaysManager($bdd);
        $em->add($france); */
        
        $em = new PaysManager($bdd);
        $pays = $em->findAll();
        
        var_dump($pays);
        
        return $this->render('Default:map.php', array(
            
        ));
    }
}

?>
