<?php 

require("../public/views/logout.php");

if(isset($_POST)){
    $session->unsetAcc();
}
?>