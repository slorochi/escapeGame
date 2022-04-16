<?php

use App\models\repository\UserRepo;
if (isset($_SESSION['compte'])){
    $userRepo = new UserRepo();
    $userRepo->setUserByChamp("email",$session->GetCompte()["email"] );
    $try = $userRepo->getDataUserSelected();
    $lvl = $try->getNiveau();
    $id = $try->getIdUser();
    $pseudo = $try->getNom();
    $email = $try->getMail();
    $mdp = $try->getMdp();
    $adresse = $try->getAdresse();
    $cp = $try->getCp();
    $ville = $try->getVille();

    require("../public/views/infos.php");
    if(isset($_POST['submit'])){
        $newPseudo = $_POST['pseudo'];
        $newEmail = $_POST['email'];
        $newMdp = $_POST['mdp'];
        $newAddress = $_POST['adresse'];
        $newCp = $_POST['cp'];
        $newVille= $_POST['ville'];
        $userRepo->modifyInfoUser($newPseudo, "nom", $id);
        $userRepo->modifyInfoUser($newEmail, "email", $id);
        $userRepo->modifyInfoUser($newAddress, "adresse", $id);
        $userRepo->modifyInfoUser($newCp, "cp", $id);
        $userRepo->modifyInfoUser($newVille, "ville", $id);
        header("Location:?p=infos"); 
    }
    else if(isset($_POST['submitPwd'])){
        $newMdp = $_POST['mdp'];
        // send hash password to BDD
        $mdpHash = password_hash($newMdp, PASSWORD_BCRYPT);
        $userRepo->modifyInfoUser($mdpHash, "mdp", $id);
        header("Location:?p=infos"); 
    }
  
}

else{
    header("Location:?p=login"); 
}


?>