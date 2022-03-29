<?php


class Verif{

    protected $errors = [];
    protected $data;

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

    public function is_alfa($field, $errorMessage){
        if(!preg_match('/^[a-zA-Z]+$/', $this->getfield($field))){
            $this->errors[$field] = $errorMessage;
            return false;
        }
        else{
            return true;
        }
    }

    public function is_mail($field, $errorMessage){
        if(!filter_var($this->getfield($field), FILTER_VALIDATE_EMAIL)){
            $this->errors[$field] = $errorMessage;
            return false;
        }
        else{
            return true;
        }
    }

    public function verif(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors; 
    }

}
?>