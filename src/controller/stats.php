<?php

use App\models\entity\User;
use App\models\entity\Jouer;
use App\models\entity\Escapegame;
use App\models\repository\UserRepo;
use App\models\repository\JouerRepo;
use App\models\repository\EscapeRepo;


if (isset($_SESSION['compte']) && !(isset($_SESSION['compte']['admin']))){
    $user1 = new UserRepo;
    $user1->setUserByChamp("email",$_SESSION['compte']['email']);
    $nomUser = $user1->getDataUserSelected();
    $nomUser->getNom();

    if(empty($nomUser->getNom())){
        $option = "";
    }else{
        $option = $nomUser->getNom();
    }

    $Leaderboard = [];
    $escape = new EscapeRepo;
    $escape->SetAllEscape();
    $esc = $escape->getTabEscape();
    $htmlOption = "";

    
    
    //Recupere tout les joueurs qui ont joué dans la escapegame selectionnée et les affiche dans le tableau
    $appelbdd = new JouerRepo();
    $leaderboard = $appelbdd->StatsJoueur($option);
    foreach ($leaderboard as $key => $value){
        
        $jouer = new Jouer();
        $jouer->setDate($value["date"]);
        $jouer->setTemps($value["temps"]);
        $jouer->setNote($value["note"]);
        $jouer->setMessage($value["message"]);

        $user = new User();
        $user->setNom($value["nomuser"]);

        $escape = new Escapegame();
        $escape->setIdEscape($value["idEscape"]);
        $escape->setNom($value["nomescape"]);

        array_push($Leaderboard, [$jouer, $user, $escape]);
    }

    $htmlLeaderboard = "";
    foreach($Leaderboard as $key => $value){
        $htmlLeaderboard .= "<tr>"."<td><form method='post'><input type='hidden' name='idEscape' value='".$value[2]->getIdEscape()."'>".$value[2]->getNom()."</td>"."<td>".$value[0]->getTemps()."</td>"."<td>".$value[0]->getDate()."</td>"."<td>".
            "<div class='form-contener'><input type='number' class='form-escape' name='note' min='0' max='5' value=".$value[0]->getNote().">"."</div>"
        ."</td>"."<td>".
        "<div class='form-contener'><input type='text' class='form-escape' name='message' value='".$value[0]->getMessage()."'>" ."</div>".
        "</td>"."<td>".
            "<input type='submit' class='btn btn-primary' value='Envoyer'>
        </form>"."</td>"."</tr>";
        
    }

    if(isset($_POST["idEscape"])){
        $newNote = $_POST['note'];
        $newMessage = $_POST['message'];

        $appelbdd->setStatsPlayer("jouer", $newNote, "note", $_POST['idEscape'], $nomUser->getIdUser());
        $appelbdd->setStatsPlayer("jouer", $newMessage, "message", $_POST['idEscape'], $nomUser->getIdUser());
        header("Refresh:0");
    }
    require("../public/views/stats.php");
}

else{
    $htmlLeaderboard = "Vous n'avez jamais fait d'Escape Game";
    require("../public/views/stats.php");
}
