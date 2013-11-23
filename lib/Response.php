<?php

namespace lib;
/**
 * Description of Response
 *
 * @author Benjamin
 */
class Response {
    
    private $content;
    
    public function __construct($content) {
        $this->content = $content;
    }
    
    public function send()
    {
        exit($this->content);
    }
    
}

?>
