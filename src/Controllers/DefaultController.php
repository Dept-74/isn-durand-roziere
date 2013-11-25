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
        
        $em = new PaysManager($bdd);
        $pays = $em->findAll();
        
        $jsArray = "var coulours = { \n";
        
        foreach($pays as $p)
        {
            $jsArray .= $p->getId().": \"".$p->generateHEX()."\", \n";
        }
        $jsArray .= "};";
        
        var_dump($jsArray);
        
        return $this->render('Default:map.php', array(
            'jsArray' => $jsArray,
        ));
    }
}

?>
