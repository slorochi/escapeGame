<?php

require_once("../core/verif.php");
use App\models\entity\User;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

if(!empty($_POST)){

   $errors = [];
    $verfContact = new Verif($_POST);
    $verfContact->is_alfa("name", "Votre nom n'est pas valide");
    $verfContact->is_mail('email', 'Votre email n\'est pas valide');
    $verfContact->is_alfa('subject', 'Votre sujet n\'est pas valide');
    $verfContact->is_alfa('message', 'Votre message n\'est pas valide');

    if($verfContact->verif()){

        if (isset($_POST['message'])) {
            mail("teixeira.gaetan@outlook.fr", $_POST['subject'], $_POST['message'], "From: ".$_POST['email']."\r\n".$_POST['name']);
        }

    }
    else{
        $errors = $verfContact->getErrors();
    }

}


require("../public/views/contact.php");

?>