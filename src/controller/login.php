<?php
require("../public/views/login.php");
/* require_once "../models/repository/UserRepo.php"; */

// gestion de la connexion 
 // Logique formulaire

 /* if (isset($_POST) && !empty($_POST)) {
    if (isset($_SESSION['compte']) && !empty($_SESSION['compte'])) {
        $compte = comptePostToCompte($_POST, $_SESSION['compte']);
        if (updateComptes($compte, 'email', COMPTE_FILE)) {
            $alert = alert("Modification du compte effectué", true);
            $_SESSION['compte'] = $compte;
        } else {
            $alert = alert("Erreur modification non effectuée", false);
        };
    }
 }
    class Login{

        public function testPost($postMail, $postMdp){
            if (isset($_POST) && !empty($_POST)) {
                $this->login($postMail, $postMdp);
            }
        }

        //attributs

        public function login($postMail, $postMdp){
            $urepo = new userRepo();
            $urepo->setAllUsers()->getTabUser();
            var_dump($urepo);
            foreach($urepo as $i=>$value){
                if($urepo[$i]["email"]=$postMail && $urepo[$i]["mdp"]=$postMdp){
                    // commence la session
                }
            }
        }
    } */
    
   
?>