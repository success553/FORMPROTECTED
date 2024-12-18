<?php
   error_reporting(E_ALL);
   include "config.php";
class Db{
    
   private $dbHost = DBHOST;
   private $dbUser = DBUSER;
   private $dbName = DBNAME;
   private $dbPassword = DBPASS;

   public $conn;

   public function connect(){
       $dsn ="mysql:host=$this->dbHost;dbname=$this->dbName";

       $options= [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
       ];

       
       try {
        $this->conn=new PDO($dsn,$this->dbUser,$this->dbPassword,$options);
    } catch (Excption $e) {
         echo $e->getMessage();
       } 

       return $this->conn;
   }
}
?>