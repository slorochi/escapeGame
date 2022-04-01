<?php


use App\core\Verif;

$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);



if(!empty($_POST)){

   $errors = [];
    $verfContact = new Verif($_POST);
    $verfContact->is_mail('email', 'Votre email n\'est pas valide');
    $verfContact->is_message('message', 'Votre message n\'est pas valide');
    $verfContact->is_alfa('name', 'Votre nom n\'est pas valide');
    $verfContact->is_alfa('subject', 'Votre sujet n\'est pas valide');

    if($verfContact->verif()){
        $verfContact->sendMail();
    }
    else{
     $errors = $verfContact->getErrors();
    }

}

require("../public/views/contact.php");

?>