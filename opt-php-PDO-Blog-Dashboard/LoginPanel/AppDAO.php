<?php
require_once 'dbconfig.php';
class AppDAO {
private $conn;
    function __construct() {
        $database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
     public function showData($table){

 $sql="SELECT * FROM $table";
 $q = $this->conn->query($sql) or die("failed!");

 while($r = $q->fetch(PDO::FETCH_ASSOC)){
 $data[]=$r;
 }
 return $data;
 }

 public function getById($userID,$table){

 $sql="SELECT * FROM $table WHERE userID = :userID";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':userID'=>$userID));
 $data = $q->fetch(PDO::FETCH_ASSOC);
 return $data;
 }

 public function update($userID,$userName,$userEmail,$table){

$sql = "UPDATE $table
 SET userName=:userName,userEmail=:userEmail
 WHERE userID=:userID";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':userID'=>$userID,':userName'=>$userName,
':userEmail'=>$userEmail));
 return true;

 }

 public function insertData($userName,$userEmail,$utype,$table){

 $sql = "INSERT INTO $table SET userName=:userName,userEmail=:userEmail,utype=:utype";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':userName'=>$userName,
     ':userEmail'=>$userEmail,':utype'=>$utype));
 return true;
 }

 public function deleteData($userID,$table){

 $sql="DELETE FROM $table WHERE userID=:userID";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':userID'=>$userID));
 return true;
 }

}
?>
