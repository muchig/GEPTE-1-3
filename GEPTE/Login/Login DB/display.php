<!DOCTYPE html>
<html>

<head>
   <title>Home Page</title>
   <link rel="stylesheet" href="style2.css">
</head>
<body>

<ul>
  <li><a class="active" href="#home">Users</a></li>
  <li><a href= "products.php">Products</a></li>

</ul>


<!-- <form action="" method="POST" enctype="multipart/form-data"> -->
<div class="welcome">
    <h2 style="margin: 0 0 30px 0;"><?php echo "Users";?></h2>
    </div>
<?php

session_start();
// echo "<table>";
//  echo "<tr><th>Image</th><th>ID</th><th>Name</th><th>Birthday</th><th>Course</th><th>Contact Number</th><th>Email Address</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$bglink = 'images/black.jpg';


// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $stmt = $conn->prepare("SELECT image, StudentNumber, FullName, Bday, Course, ContactNumber, EmailAddress FROM MyGuests");
//     $stmt->execute();

//     // set the resulting array to associative
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//         echo $v;
//         // echo '<img src="data:image;base64,'.base64_encode($k['image']).'" alt="Image" style="width: 100px; height: 100px;">';

//     }
// }
// catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
// $conn = null;
// echo "</table>";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image, StudentNumber, FullName, Bday, Course, ContactNumber, role, EmailAddress FROM MyGuests ORDER BY StudentNumber + 0 ASC";
$result = $conn->query($sql);


  echo "<div class='tabe'>
        <table><tr><th style='text-align: center;'>Image</th><th>ID</th><th>Name</th><th>Birthday</th><th>Course</th><th>Contact Number</th><th>Role</th><th>Email Address</th></tr>
        ";
   // output data of each row
   while($row = $result->fetch_assoc()) {


    $_SESSION['StudentNumber'] = $row['StudentNumber'];
    $_SESSION['FullName'] = $row['FullName'];
    $_SESSION["Bday"] = $row["Bday"];
    $_SESSION["Course"] = $row["Course"];
    $_SESSION["ContactNumber"] = $row["ContactNumber"];
    $_SESSION["role"] = $row["role"];
    $_SESSION["EmailAddress"] = $row["EmailAddress"];

    echo "<tr ><td style='text-align: center;'>" . ' <form method="post" action="./profile.php"> <input style="padding: 0;" type="hidden" name="Number" value='. $row["StudentNumber"].'> <input type="image" value='. $row["StudentNumber"].' 
                         src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 75px; height: 75px; border: 2px solid black; border-radius: 100px; padding: 0; "/> </form>' . "</td>
              <td>" . $row["StudentNumber"]. "</td><td>" . $row["FullName"]. "</td><td>" . $row["Bday"]. "</td>
              <td>" . $row["Course"]. "</td><td>" . $row["ContactNumber"]. "</td><td>" . $row["role"]. "</td><td>" . $row["EmailAddress"]. "</td></tr>";

    
}
echo "</table></div>";

$conn->close(); 


// LOGOUT
if (isset($_POST['logout'])) {
    unset($username);
}
if (!isset($username)) {
    // header("Location: index.php");
    // echo("<script> location.replace("./index.php"); </script>");
    echo("<script>location.href = './index.php?msg=$msg';</script>");
    exit();
}

?>

</form>
    <!-- LOGOOUT -->

    <div class="row">
        <div class="column">
            <form method="post">
            <input type="hidden" name="logout" value="1"/>
            <input type="submit" value="logout"/>
            </form>
        </div>
        <div class="column">
            <form action="register.php" method="post">
            <input type="submit" value="Add"/>
            </form>
        </div>
    </div>
   

<body style= "<?php echo "
background: url($bglink) no-repeat;
background-attachment: fixed;
    background-size: cover;" ?>">
</body>
</html>