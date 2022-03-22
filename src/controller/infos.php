<?php

use App\models\repository\UserRepo;
if (isset($_SESSION['compte'])){
    $userRepo = new UserRepo();
    $user = $userRepo->getUserByChamp("email",$session->GetCompte()["email"])[0];
    $userRepo->setUserByChamp("email",$session->GetCompte()["email"] );
    $try = $userRepo->getDataUserSelected();
    $lvl = $try->getNiveau();
    $id = $try->getIdUser();
    $pseudo = $try->getNom();
    $email = $user["email"];
    $mdp = $user["mdp"];
    $adresse = $user["adresse"];
    $cp = $user["cp"];
    $ville = $user["ville"];

    /* $editPseudo ="<div class='row col-md-6 justify-content-evenly'> 
        <input type='text' name ='pseudo' class='' style='width:250px'
        placeholder='Enter your new pseudo here'/>
        <input type='submit' style='width:100px' value='confirm' name='submitPseudo' class''>
        </div>"; */
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
        $userRepo->modifyInfoUser($newMdp, "mdp", $id);
        $userRepo->modifyInfoUser($newAddress, "adresse", $id);
        $userRepo->modifyInfoUser($newCp, "cp", $id);
        $userRepo->modifyInfoUser($newVille, "ville", $id);
        header("Location:?p=infos"); 
    }
  
}

else{
    header("Location:?p=login"); 
}


/* else if(isset($_POST['submit2'])){
    $editMail ="true";
}
else if(isset($_POST['submit3'])){
    $editMdp ="true";
}
else if(isset($_POST['submit4'])){
    $editAdress ="true";
}
else if(isset($_POST['submit5'])){
    $editCp ="true";
}
else if(isset($_POST['submit6'])){
    $EditVille ="true";
} */
?>