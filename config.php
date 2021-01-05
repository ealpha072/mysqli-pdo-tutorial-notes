<?php
  #creating a new connection

  $dsn = "mysql:host=localhost;dbname=test;charset=utf8mb4";
  $username = "root";
  $password = "yes";
  try{
    $conn = new PDO($dsn,$username,$password);
    //set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!!";
  }catch(Exceptions $e){
    echo "Connection failed ".$e->getMessage();
  }

?>