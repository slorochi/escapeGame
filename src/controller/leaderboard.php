<?php

use App\models\repository\UserRepo;
use App\models\repository\EscapeRepo;



$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);
    
/* $user = new UserRepo(); 
$user->setAllUsers();
$tabUser = $user->getTabUser();
$escape = new EscapeRepo();
$escape->setEscapeToCreate("test","1","3","adresse","24442","Dreux"); 
$user->setUserToCreate("TEST","test@gmail.com","TEST","5","rue des bg","29000","AZEaze"); */

$var = ($leaderboard->getLeaderboard());
$accounts = $var->getAccounts(); 
$accountsCreated = $var->getAccountsCreated(); 
$connexions = $var->getConnexions(); 

require("../public/views/leaderboard.php");

?>
