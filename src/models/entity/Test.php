<?php

require("User.php");

$user = new User;
$user->setNom("theo");
var_dump($user->getNom());
?>