<?php

require("../entity/User.php");

$user = new User;
$user->setNom("theo");
var_dump($user->getNom());
require("../models/BddConnection.php");


$user = new User;
$user->setNom("Anthony");

$html = ($user->getData()); 
$level = $html[0]["niveau"];
$currentUser = $html[0]["nom"];

class UserRepo extends User{

    protected $data;
    protected $idUser;
    protected $nom;
    protected $mail;
    protected $mdp;
    protected $niveau;
    protected $adresse;
    protected $cp;
    protected $ville;

    public function setData(string $nom){
        $user = new User
        $user->setDataByusername($nom)
    }
    /////////ID//////////
    public function getIdUser()
    {
        return $this->idUser;
    }

    /////////NOM//////////
    public function getNom()
    {
        return $this->nom;
    }

    /////////MAIL//////////
    public function getMail()
    {
        $user = new User;
        $user->setNom($name); 
    }

    /////////MDP//////////
    public function getMdp()
    {
        return $this->mdp;
    }

    /////////NIVEAU//////////
    public function getNiveau()
    {
        return $this->niveau;
    }

    /////////ADRESSE//////////
    public function getAdresse()
    {
        return $this->adresse;
    }

    /////////CP//////////
    public function getCp()
    {
        return $this->cp;
    }

    /////////VILLE//////////
    public function getVille()
    {
        return $this->ville;
    }
} 
?>