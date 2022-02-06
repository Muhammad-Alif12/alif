<?php
// used to get mysql database connection
class DatabaseService{

    private $db_host = "localhost";
    private $db_name = "21_jwt_capil";
    private $db_user = "root";
    private $db_password = "palaguna_maria_33";
    private $connection;

    public function getConnection(){

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->db_host . ";port=3370;dbname=" . $this->db_name, $this->db_user, $this->db_password);
        }catch(PDOException $exception){
            echo "Connection failed: " . $exception->getMessage();
        }

        return $this->connection;
    }
}
?>