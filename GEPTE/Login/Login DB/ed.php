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

$file = $_FILES["image"]["tmp_name"];
$id = $_POST['id'];
$item = $_POST['item'];
$description = $_POST['description'];
$price = $_POST['price'];

//sql to insert
if (empty($file)) {
    $sql = "UPDATE products SET id = '$id', item = '$item', description = '$description', price = '$price'
        WHERE id = $id";
  }

else{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $sql = "UPDATE products SET id = '$id', item = '$item', description = '$description', price = '$price', image = '$file'
        WHERE id = $id";
}


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

    header('Location: ./products.php');
// }



?>