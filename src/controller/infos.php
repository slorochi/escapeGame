<?php

use App\models\repository\UserRepo;
if (isset($_SESSION['compte'])){
    $userRepo = new UserRepo();
    $userRepo->setUserByChamp("email",$session->GetCompte()["email"] );
    $userCurrent = $userRepo->getDataUserSelected();
    $lvl = $userCurrent->getNiveau();
    $id = $userCurrent->getIdUser();
    $pseudo = $userCurrent->getNom();
    $email = $userCurrent->getMail();
    $mdp = $userCurrent->getMdp();
    $adresse = $userCurrent->getAdresse();
    $cp = $userCurrent->getCp();
    $ville = $userCurrent->getVille();
    // if admin
        $userRepo->setAllUsers();
        $allUsersArray = $userRepo->getTabUser();
        $allUsers = "";
        /* var_dump($allUsersArray);  */
        foreach ($allUsersArray as $key => $value){
            $allUsers .="<tr>" ."<td>" .$value->getIdUser()."</td>" ."<td>".$value->getNom()."</td>" ."<td>".$value->getMail()."</td>" ."<td>".$value->getNiveau()."</td>"."<td>" .$value->getCp()."</td>"."<td>" .$value->getVille()."</td>"."<td>".$value->getAdmin()."</td>"."<td><form method='post'><input type='hidden' name='deleteUser' value='" .$value->getIdUser() ."'><button type='submit' name='delete' class='btn btn-primary' >Supprimer </button></form></td></tr>";
        }
   
     

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
    else if (isset($_POST['deleteUser'])){
        $userRepo->deleteUserByUserId($_POST['deleteUser']);
        header("Location:?p=infos"); 
    }
}

else{
    header("Location:?p=login"); 
}


?>