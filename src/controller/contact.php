<?php


use App\core\Verif;

$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

$verif ="";

if(!empty($_POST)){
    
    $errors = [];
    $verfContact = new Verif($_POST);
    $verfContact->is_mail('email', 'Votre email n\'est pas valide');
    $verfContact->is_message('message', 'Votre message n\'est pas valide');
    $verfContact->is_name('name', 'Votre nom n\'est pas valide');
    $verfContact->is_message('subject', 'Votre sujet n\'est pas valide');

    if($verfContact->verif()){
        $verfContact->sendMail($_POST['subject'],$_POST['message'],$_POST['email'],$_POST['name']);
        $verif = '<p class="alert alert-success">Votre message a bien été envoyé</p>';
    }
    else{
        $errors = $verfContact->getErrors();
        
    }

}

require("../public/views/contact.php");

?>