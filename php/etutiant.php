<?php
require_once('utilisateur.php');

class Etudiant extends Utilisateur{
    protected $nom;
    protected $prenom;
    protected $numero;
    protected $id;
    protected $password;

    function __construct($nom,$prenom,$numero,$id,$password){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->numero=$numero;
        $this->id=$id;
        $this->password=$password;
        }

 function getnom(){
    return $this->nom;
 }
function setnom($nom){
    return $this->nom=$nom;
 }

 
}

