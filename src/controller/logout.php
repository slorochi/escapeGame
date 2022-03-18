<?php 

require("../public/views/logout.php");

if(isset($_POST)){
    unset($_SESSION['compte']);
}
/* unset($_SESSION['compte']); */
?>