<?php

use App\models\entity\User;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);





require("../public/views/contact.php");

?>