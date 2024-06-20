<?php 
// here in database file deals with any opreation fro database connection



namespace App\Database;
use PDO;
use PDOException;

class Database {

    
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct($config) {
        $this->host = $config['DB_HOST'];
        $this->db_name = $config['DB_NAME'];
        $this->username = $config['DB_USERNAME'];
        $this->password = $config['DB_PASSWORD'];

    }

    public function getConnection(){
        $this->conn = null;

        try {   
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username,$this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        }
        catch(PDOException $exception) {
            echo "connection error ".$exception->getMessage()."";

        }
        return $this->conn;

    }
}
?>