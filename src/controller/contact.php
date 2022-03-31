<?php


use App\core\Verif;
use App\models\entity\User;
$backpage = "?p=" .str_replace(".php","", basename(__FILE__));
$session->setBackpage($backpage);

if(!empty($_POST)){

   $errors = [];
    $verfContact = new Verif($_POST);
    $verfContact->is_mail('email', 'Votre email n\'est pas valide');

    if($verfContact->verif()){
        $verfContact->sendMail('subject','message','email','name');
    }
    else{
        $errors = $verfContact->getErrors();
    }

}


require("../public/views/contact.php");

?>