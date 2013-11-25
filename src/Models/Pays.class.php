<?php

namespace src\Models;

/**
 * Description of Pays
 * L'id est le doublet de lettres officiel.
 * @author ROMAIN
 */
class Pays
{
    private $id;
    private $nom;
    private $points;
    private $votes;
    
    public function __construct($id, $nom, $points, $votes)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->points = $points;
        $this->votes = $votes;
    }
    
    public function generateHEX()
    {        
        // $mood s'étend de -2 à 2
        // BugBug : Division par 0 non gérée
        // Renvoyer du gris clair si pas de votes
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
    
    
    /* Getters et Setters */
    
    /**
     * getId
     * @return varchar
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
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
    
    /**
     * Réinitialise les points.
     */
    public function restartPoints()
    {
        $this->points = 0;
    }
    
    /**
     * Ajoute les points et incrémente les votes.
     * @param type $nbrPoints
     */
    public function addPoints($nbrPoints)
    {
        $this->points = $this->points + $nbrPoints;
        $this->votes = $this->votes + 1;
    }
    
    public function getVotes()
    {
        return $this->votes;
    }
    
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }
}

?>