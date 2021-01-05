<?php
  #creating a new connection

  $dsn = "mysql:host=localhost;dbname=demo;charset=utf8mb4";
  $username = "root";
  $password = "";
  try{
    $conn = new PDO($dsn,$username,$password);
    //set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!!"."<br>";
    //$conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  }catch(Exceptions $e){
    echo "Connection failed ".$e->getMessage();
  }

  //creating a database
  /*try{
    $sql ="CREATE DATABASE demo";
    $conn->exec($sql);
    echo "Database created successfully";
  }catch(Exceptions $e){
    die("Error: Not able to execute $sql. " .$e->getMessage());
  }*/
  try{
    $sql = "CREATE TABLE persons(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    ) ";
    $conn->exec($sql);
    echo "Table created successfully!!";
  }catch(Exceptions $e){
    die ("Error: Could execute .$sql ".$e->getMessage());
  }
  //closing connection
  $conn = null; //or unset($conn)
?>