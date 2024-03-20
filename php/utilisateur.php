<?php
class Etudiant extends Utilisateur{
    protected $nom;
    protected $prenom;
    protected $numero;
    protected $id;
    protected $password;

    public-function __construct($nom,$prenom,$numero,$id,$password){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->numero=$numero;
        $this->id=$id;
        $this->password=$password;
        }


    public function getnom() {
        return $this->nom;
    }


    public function setnom($nom) {
        $this->nom = $nom;
    }


    public function getprenom() {
        return $this->prenom;
    }
}

