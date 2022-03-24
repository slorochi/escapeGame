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
    $escape->setEscapeToCreate("1", "test","1","3","adresse","24442","ville");
    $userrr->setUserToCreate("idUserr", "nomm", "mmail", "mmdp","mniveau", "madresse", "cpm", "vilmle");
    var_dump($userrr);
}



require("../public/views/leaderboard.php");

?>
