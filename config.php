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
  /*
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
    die ("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  //single entry
  /*
  try {
    $sql = "INSERT INTO persons 
    (first_name, last_name, email)
    VALUES ('Peter', 'Parker', 'peterparker@mail.com')";
    $conn->exec($sql);
    echo " Records added successfully";
  } catch (Exceptions $e) {
    die ("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  //multiple entries
  /*
  try {
    $sql = "INSERT INTO persons 
    (first_name, last_name, email)
    VALUES ('John', 'Rambo', 'johnrambo@mail.com'),
          ('Clark', 'Kent', 'clarkkent@mail.com'),
          ('John', 'Carter', 'johncarter@mail.com'),
          ('Harry', 'Potter', 'harrypotter@mail.com')";  
    $conn->exec($sql);
    echo " Records inserted successfully";
  } catch (Exceptions $e) {
    die ("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  //working with form data
  /*
  try {
    //CREATE PREPAIRED STMTS
    $sql = "INSERT INTO persons (first_name, last_name, email)
    VALUES (:first_name, :last_name, :email)";
    $stmt = $conn->prepare($sql);

    //bind parameters to statement
    $stmt->bindParam(':first_name', $_REQUEST['first_name'],PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $_REQUEST['last_name'],PDO::PARAM_STR);
    $stmt->bindParam(':email', $_REQUEST['email'],PDO::PARAM_STR);

    //execute the prepired stmt
    $stmt->execute();
    echo "Records added successfully";
  } catch (Exceptions $e) {  
    die ("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  /*
  try {
    $sql = "INSERT INTO persons (first_name, last_name, email)
    VALUES (:first_name,:last_name,:email)";

    $stmt =$conn->prepare($sql);

    //binding
    $stmt->bindParam(':first_name',$first_name,PDO::PARAM_STR);
    $stmt->bindParam(':last_name',$last_name,PDO::PARAM_STR);
    $stmt->bindParam(':email',$email,PDO::PARAM_STR);

    //PDO::PARAM_STR tells th system that the incoming bind param is a string
    //set the parameters and execute
    $first_name  ="Hermonie";
    $last_name = "Owen";
    $email = "hermonie@gmail.com";
    
    $stmt->execute();

    echo "Record inserted successfully";

  } catch (Exceptions $e) {
    die ("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  /*
  try {
    $sql = "INSERT INTO persons (first_name, last_name, email)
    VALUES ('Ron', 'Weasley', 'ronweasley@mail.com')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();

    echo "Record inserted successfully. Last ID entered was ". $last_id;
  } catch (Exceptions $er) {
    die("Error: Could not execute .$sql ".$e->getMessage());
  }*/
  try {
    //code...
    $sql = "SELECT * FROM persons";
    $results = $conn->query($sql);
    if($results->rowCount()>0){?>

      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">E-mail</th>
          </tr>
        </thead>
        <?php while($row= $results->fetch()){?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['email'];?></td>
          </tr>
        <?php }?>  
      <table>
    <?php } else { echo "No results found for your query";}?>

<?php 
      //unset results
      unset($results);

  } catch (Exceptions $e) {
    die("Error: Could not execute .$sql ".$e->getMessage());
  }

  //close stmt
  unset($stmt);
  //closing connection
  $conn = null; //or unset($conn)
?>