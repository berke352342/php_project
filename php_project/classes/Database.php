<?php
class Database {

    private $host = "172.31.22.43"; // database host
    private $db_name = "Ahmet200575280"; // database name
    private $username = "Ahmet200575280"; // database username
    private $password = "a5yYDXeotX"; // database password

    public $conn;


    public function __construct() { // it will connect to the database
        try {
            $this->conn = new PDO( 
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );

             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
         die("DB connection has failed:" . $e -> getMessage()); // if the connection fails it shows this message
         }
      }

}
?>