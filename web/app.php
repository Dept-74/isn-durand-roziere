<?php
/**
 * Projet : ISN What's the world's mood today ?
 * Front Controller
 * @author Romain DURAND - Benjamin ROZIERE 
 */
require_once __DIR__.'/../lib/autoload.php';

use lib\Kernel;
use lib\Request;

$kernel = new Kernel();
$request = new Request();

$kernel->handle($request);

?>