<?php
if (isset($_SESSION['compte'])){
    require("../public/views/stats.php");
}

else{
    header("Location:?p=login"); 
}

?>