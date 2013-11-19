<?php

class Kernel
{
    private $message;
    
    public function __construct() {
        $message = "Hello World";
        return $this->message;
    }
}

?>
