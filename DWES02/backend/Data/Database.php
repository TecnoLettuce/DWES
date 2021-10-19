<?php
class Database {

    public $conn;
    private $host = 'localhost';
    private $username = "root";
    private $password = "";
    private $dbName = "dwes02contacts";

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            return $this->conn;
            
        } catch (PDOException $exception) {
            echo "Error de conexión"; 
        }
        
    }

    public function getConnParameter() {
        return $this->conn;
    }
}