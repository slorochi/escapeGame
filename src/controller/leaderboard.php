<?php

use App\models\repository\UserRepo;
use App\models\repository\EscapeRepo;



if(isset($_POST['submit'])){
    $backpage = "?p=" .str_replace(".php","", basename(__FILE__));
    $session->setBackpage($backpage);
    
    $userrr = new UserRepo(); 
    $userrr->setAllUsers();
    $tabUser = $userrr->getTabUser();
    $escape = new EscapeRepo();
    $escape->setEscapeToCreate("test","1","3","adresse","24442","Dreux"); 
    $userrr->setUserToCreate("TEST","test@gmail.com","TEST","5","rue des bg","29000","AZEaze");
}



require("../public/views/leaderboard.php");

?>
