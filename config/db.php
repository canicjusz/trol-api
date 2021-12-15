<?php

class DB {
        private $host = 'eu-cdbr-west-01.cleardb.com';
        private $dbname = 'heroku_9a37366182b5a0b';
        private $user = 'ba84dd51f09433';
        private $pass = '5de473f9';
        // private $host = 'localhost';
        // private $user = 'root';
        // private $pass = '';
        // private $dbname = 'rest_api';

        public function connect() {
            $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
            $conn = new PDO($conn_str, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        }

}

function getFromDatabase($query, $parameters = null){
    $db = new DB();
    $conn = $db->connect();

    if($parameters != null){
        $stmt = $conn->prepare($query);
        for($i = 0; $i < count($parameters); $i++){
            $stmt->bindParam($i + 1, $parameters[$i], is_string($parameters[$i]) ? PDO::PARAM_STR : PDO::PARAM_INT);
        }
        $stmt->execute();
    }else{
        $stmt = $conn->query($query);
    }
    
    // nie wiem czy to potrzebne ale niech zostanie
    $db = null;
    return $stmt->fetchALL(PDO::FETCH_OBJ);
}
