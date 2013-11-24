<?php

namespace src\Models;

/**
 * Description of Pays
 *
 * @author ROMAIN
 */
class Pays 
{
    private $nom;
    private $points;
    private $votes;
    
    public function __construct($nom,$points,$votes)
    {
        $this->nom = $nom;
        $this->points = $points;
        $this->votes = $votes;
    }
    
    public function generateHEX()
    {        
        // $mood s'étend de -2 à 2
        $mood = ($this->points)/($this->votes);
        $b = 64;
        
        if($mood <= 0) {
            $r = 164;
            $v = 50 * $mood + 164;
        }
        if($mood > 0) {
            $v = 164;
            $r = -50 * $mood + 164;
        }
        
        $hex = '#'.\dechex($r).\dechex($v).\dechex($b);
        
        return $hex;
    }
    
    
    /*Getters et Setters simples*/
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function getPoints()
    {
        return $this->points;
    }
    
    public function getVotes()
    {
        return $this->votes;
    }
}

?>