<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

//Create connection 
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);
    
}

//Create Database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE){
//     echo "DATABASE created successfully";
// } else {
//     echo "Error creating database: ". $conn->error;
// }

//sql to create table
$sql = "CREATE TABLE MyGuests (
    StudentNumber INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(30) NOT NULL,
    Bday VARCHAR(30) NOT NULL,
    Course VARCHAR(30),
    ContactNumber VARCHAR(30),
    EmailAddress VARCHAR(50),

    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";


    if ($conn->query($sql) === TRUE){
        echo "table created successfully";
    }else{
        echo "Error creating table: ". $conn->error;
    }

//sql to insert
// $sql = "INSERT INTO MyGuests(firstname, lastname, email)
//         VALUES ('Diego', 'Diaz', 'ddiaz@yahoo.com')";


// if ($conn->query($sql) === TRUE){
//     $last_id = $conn->insert_id;
//     echo "New record created successfully. Last inserted ID is: ". $last_id;
// }else{
//     echo "Error: ". $sql . "<br>" . $conn->error;
// }
// echo "Connected Successfully!";
?>
