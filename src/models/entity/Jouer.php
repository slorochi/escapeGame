<?php

namespace App;

use App\BddConnection;

class Jouer extends BddConnection{
   protected $idUser;
   protected $idEscape;
   protected $date;
   protected $temps;
   protected $note;
   protected $message;

   

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
      $this->idUser = $idUser;

      return $this;
   }

   /**
    * Get the value of idEscape
    */ 
   public function getIdEscape()
   {
      return $this->idEscape;
   }

   /**
    * Set the value of idEscape
    *
    * @return  self
    */ 
   public function setIdEscape($idEscape)
   {
      $this->idEscape = $idEscape;

      return $this;
   }

   /**
    * Get the value of date
    */ 
   public function getDate()
   {
      return $this->date;
   }

   /**
    * Set the value of date
    *
    * @return  self
    */ 
   public function setDate($date)
   {
      $this->date = $date;

      return $this;
   }

   /**
    * Get the value of temps
    */ 
   public function getTemps()
   {
      return $this->temps;
   }

   /**
    * Set the value of temps
    *
    * @return  self
    */ 
   public function setTemps($temps)
   {
      $this->temps = $temps;

      return $this;
   }

   /**
    * Get the value of note
    */ 
   public function getNote()
   {
      return $this->note;
   }

   /**
    * Set the value of note
    *
    * @return  self
    */ 
   public function setNote($note)
   {
      $this->note = $note;

      return $this;
   }

   /**
    * Get the value of message
    */ 
   public function getMessage()
   {
      return $this->message;
   }

   /**
    * Set the value of message
    *
    * @return  self
    */ 
   public function setMessage($message)
   {
      $this->message = $message;

      return $this;
   }
}