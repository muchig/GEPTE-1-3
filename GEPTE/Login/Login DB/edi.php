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

// $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$file = $_FILES["image"]["tmp_name"];
$studno = $_POST['StudentNumber'];
$name = $_POST['FullName'];
$bday = $_POST['Bday'];
$course = $_POST['Course'];
$contactno = $_POST['ContactNumber'];
$email = $_POST['EmailAddress'];
$password = $_POST['password'];

//sql to insert
// $sql = "UPDATE MyGuests(StudentNumber, FullName, Bday, Course, ContactNumber, EmailAddress, pass, image)
//         VALUES ('$studno', '$name', '$bday', '$course', '$contactno', '$email', '$password', '$file')
//         WHERE StudentNumber = $studno";

echo "$file";

if (empty($file)) {
    $sql = "UPDATE MyGuests SET StudentNumber = '$studno', FullName = '$name', Bday = '$bday', Course = '$course', ContactNumber = '$contactno', EmailAddress = '$email', pass = '$password'
        WHERE StudentNumber = $studno";
  }

else{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $sql = "UPDATE MyGuests SET StudentNumber = '$studno', FullName = '$name', Bday = '$bday', Course = '$course', ContactNumber = '$contactno', EmailAddress = '$email', pass = '$password', image = '$file'
        WHERE StudentNumber = $studno";
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

    header('Location: ./display.php');
// }



?>