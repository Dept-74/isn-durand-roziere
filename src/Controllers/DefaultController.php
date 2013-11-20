<?php
require '../lib/Controller.php';

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('index.html');
    }
}

?>
