<?php

require "bddConnection.php";

$item = new BddConnection ;
var_dump($item->tous("user"));

?>