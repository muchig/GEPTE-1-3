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

// include 'users.php';
// session_start();
// $username = $_POST['username'];
// $password = $_POST['password'];

$studno = $_POST['StudentNumber'];

//sql to insert
$sql = "DELETE FROM myguests WHERE `myguests`.`StudentNumber` = '$studno'";


if ($conn->query($sql) === TRUE){
    $last_id = $conn->insert_id;
    // echo "New record created successfully. Last inserted ID is: ". $last_id;
}else{
    echo "Error: ". $sql . "<br>" . $conn->error;
}
// echo "Connected Successfully!";

// if (array_key_exists( $username, $_SESSION['users'])){
//     header('Location: ./register.php');
// }else{
    

//     $_SESSION['users'] += [$username => array(
//         'password' => $password,
//         'img' => 'images/user.jpg'
//     )];

    header('Location: ./display.php');
// }



?>