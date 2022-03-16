<?php
namespace App;

class Niveau{
    
    protected $id;
    protected $titre;
    protected $description;
    protected $ordreNiveau;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of ordreNiveau
     */ 
    public function getOrdreNiveau()
    {
        return $this->ordreNiveau;
    }

    /**
     * Set the value of ordreNiveau
     *
     * @return  self
     */ 
    public function setOrdreNiveau($ordreNiveau)
    {
        $this->ordreNiveau = $ordreNiveau;

        return $this;
    }
}