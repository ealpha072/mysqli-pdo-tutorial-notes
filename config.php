<?php
  #creating a new connection

  $dsn = "mysql:host=localhost;dbname=myDB;charset=utf8mb4";
  $username = "root";
  $password = "";
  try{
    $conn = new PDO($dsn,$username,$password);
    echo "Connected successfully!!";
  }catch(Exceptions $e){
    echo "Connection failed ".$e->getMessage();
  }

?>