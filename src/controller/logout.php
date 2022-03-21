<?php 

require("../public/views/logout.php");

if(isset($_POST['submit'])){
    $session->unsetAcc();
}
?>