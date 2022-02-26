<?php 

namespace Database;

class BddConnection{
    
    private $dbname;
    private $host;
    private $username;
    private $password;

    public function __construct(string $dbname, string $host, string $username, string $password){
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;

    }

    public fonction getPDO(): PDO{

        if($this->pdo === null){
            $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host},$this->username,$this->password");
        }

        return $this->pdo;
    }
}

?>