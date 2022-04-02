<?php
namespace App\core;

class Verif{

    protected $errors = [];
    protected $data;
    protected $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";
    protected $regexMessage = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð+ ,.'-]+$/u";

    public function __construct($data){
        $this->data = $data;
    }

    private function getfield($field){
        if(!isset($this->data[$field])){
            return null;
        }else{
            return $this->data[$field];
        }
    }

    public function is_name($field, $errorMessage){
        if(!preg_match($this->regexName, $this->getfield($field))){
            $this->errors[$field] = $errorMessage;
            return false;
        }
        else{
            return true;
        }
    }

    public function is_message($field, $errorMessage){
        if(!preg_match($this->regexMessage, $this->getfield($field))){
            $this->errors[$field] = $errorMessage;
            return false;
        }
        else{
            return true;
        }
    }

    public function is_mail($field, $errorMessage){
        if(!filter_var($this->getfield($field), FILTER_VALIDATE_EMAIL )){
            $this->errors[$field] = $errorMessage;
            return false;
        }
        else{
            return true;
        }
    }

    public function sendMail($subject,$message,$email,$name){
        mail("teixeira.gaetan@outlook.fr", $subject, $message, "From: ".$email."\r\n".$name);
    }

    public function verif(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors; 
    }
    
}
?>