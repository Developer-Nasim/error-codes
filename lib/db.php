<?php
    class dnc{
        private $servarname   = "localhost";
        private $username     = "root";
        private $password     = "";
        private $database     = "smp";
        private $port ="3306";
        public $pdo;
        
        public function __construct(){ 
            if (!isset($this->pdo)) {
                try {
                    $con = new PDO("mysql:host=$this->servarname;port=$this->port;dbname=$this->database", $this->username, $this->password); 
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                    $con->exec("SET CHARACTER SET utf8"); 
                    echo "Connected successfully";
                    $this->pdo = $con; 
                }
                catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            }
        }
    } 
?> 
 