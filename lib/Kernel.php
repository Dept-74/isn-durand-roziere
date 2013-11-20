<?php

class Kernel
{
    public function __construct() {
        // Temporaire en attendant le request :
        require '../src/Controllers/DefaultController.php';
        $controller = new DefaultController;
        $controller->indexAction();
    }
}

?>