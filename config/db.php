<?php

class DB {
        // private $host = 'eu-cdbr-west-01.cleardb.com';
        // private $dbname = 'heroku_9a37366182b5a0b';
        // private $user = 'ba84dd51f09433';
        // private $pass = '5de473f9';
        private $host = 'localhost';
         private $user = 'root';
         private $pass = '';
         private $dbname = 'rest_api';

        public function connect() {
            $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
            $conn = new PDO($conn_str, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

}

function getFromDatabase($query){
    $db = new DB();
    $conn = $db->connect();

    $stmt = $conn->query($query);

    // nie wiem czy to potrzebne ale niech zostanie
    $db = null;
    return $stmt->fetchALL(PDO::FETCH_OBJ);
}
