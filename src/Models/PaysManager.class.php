<?php

namespace src\Models;

use src\Models\Pays;

/**
 * Le manager réduit le nombre de requètes SQL à une seule par chargement de la page.
 * Il s'occupe de renvoyer l'intégralité des valeurs de tous les pays.
 * Ainsi la connexion est optimisée pour permettre un trafic adapté au type de site.
 * 
 * @author ROMAIN
 */
class PaysManager {
    
    private $_db; //On récupère PDO
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function setDb(\PDO $db)
    {
        $this->_db = $db;
    }
    
    /**
     * Retourne un array d'objets pays, c'est la méthode de génération de la map
     * @return Array Array des pays
     */
    public function findAll()
    {
        $pays = array();        
        $req = $this->_db->query('SELECT id, nom, points, votes FROM pays ORDER BY id');
        
        if(!$req)
        {
            throw new \RuntimeException('Impossible de récuperer les pays, la table est vide !');
        }
        
        while ($donnees = $req->fetch())
        {
            $pays[] = new Pays($donnees['id'],$donnees['nom'],$donnees['points'],$donnees['votes']);
        }
        return $pays;
    }
    
    /**
     * Pour les statistiques d'un pays en particulier
     * Ientification par Id
     * @param int $id
     */
    public function findById($id)
    {
        $id = (int) $id;
        
        $req = $this->_db->query('SELECT id, nom, points, votes FROM pays WHERE id = '.$id);
        $donnees = $req->fetch();
        
        return new Pays($donnees);
    }
    
    /**
     * Ajoute un pays (Pour les ajouter plus facilement en bd ^^)
     * @param src\Models\Pays $pays
     */
    public function add(Pays $pays)
    {
         $req = $this->_db->prepare('INSERT INTO pays SET id = :id, nom = :nom, points = :points, votes = :votes');
         $req->execute(array(
             'id' => $pays->getId(),
             'nom' => $pays->getNom(),
             'points' => $pays->getPoints(),
             'votes' => $pays->getVotes(),
         ));
    }
    
    public function update(Pays $pays)
    {
        $req = $this->_db->prepare('UPDATE pays SET id = :id, nom = :nom, points = :points, votes = :votes');
        $req->execute(array(
            'id' => $pays->getId(),
            'nom' => $pays->getNom(),
            'points' => $pays->getPoints(),
            'votes' => $pays->getVotes(),
         ));
    }
}

?>