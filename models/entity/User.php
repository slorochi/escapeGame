<?php
require("../models/BddConnection.php");
class User extends BddConnection{

    private $idUser;
    private $nom;
    private $mail;
    private $mdp;
    private $niveau;
    private $adresse;
    private $cp;
    private $ville;


    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $bdd = new BddConnection;
        $this->idUser = $bdd->specifique("user","idUser",$idUser);

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setDataByUsername($nom)
    {
        $i = new BddConnection;
        $this->data = $i->specifique("user","nom",$nom);

        return $this;
    }

    public function setAllDataByUsername()
    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $i = new BddConnection;
        $this->$mail = $i->specifique("user","mail",$mail);

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $i = new BddConnection;
        $this->$mdp = $i->specifique("user","mdp",$mdp);

        return $this;
    }

    /**
     * Get the value of niveau
     */ 
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set the value of niveau
     *
     * @return  self
     */ 
    public function setNiveau($niveau)
    {
        $i = new BddConnection;
        $this->$niveau = $i->specifique("user","niveau",$niveau);

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $i = new BddConnection;
        $this->$adresse = $i->specifique("user","adresse",$adresse);

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $i = new BddConnection;
        $this->$cp = $i->specifique("user","cp",$cp);

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $i = new BddConnection;
        $this->$ville = $i->specifique("user","ville",$ville);

        return $this;
    }
}

?>