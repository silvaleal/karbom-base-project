<?php

namespace Karbom;

use PDO;

class Database
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $pdo;

    public function __construct() {
        $rules = Rules::get()['mysql'];
        
        $this->host = $rules['dbHost'];
        $this->user = $rules['dbUser'];
        $this->password = $rules['dbPassword'];
        $this->database = $rules['dbName'];
    }

    public function prepare()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        } catch (\Throwable $th) {
            $pdo = new PDO("mysql:host=$this->host", $this->user, $this->password);

            $pdo->exec("CREATE DATABASE $this->database");
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        }
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }

    public function connect()
    {  
        $this->prepare();
        return $this->pdo;
    }
}