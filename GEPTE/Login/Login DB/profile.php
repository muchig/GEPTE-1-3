<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <!-- <h1>Hello</h1> -->

<?php
 
 session_start();

 $bglink = 'images/nyc.jpeg';

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "myDB";

$con = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$con) {

    echo "Connection failed!";

}

    $studno = $_POST['Number'];

    // echo $studno;
                     
        $query    = "SELECT image, StudentNumber, FullName, Bday, Course, ContactNumber, EmailAddress, pass FROM MyGuests WHERE StudentNumber = $studno";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['StudentNumber'] = $studno;


            echo '<div class="coninfo">';
            while($rows = $result->fetch_assoc())
            {
                echo '<img src="data:image;base64,'.base64_encode($rows['image']).'" alt="Image" style="width: 150px; height: 150px; margin: 0px; border: 3px solid black; border-radius: 100px;"/> </br>';

                echo '<form method="post" action="edit.php">
                <input type="hidden" name="logout" value="1"/>
                <input class="edit" type="submit" value="edit profile" style="background-color: #b6b6b6; width: 200px;"/>';

                echo '<input type="hidden" name="FullName1" value="'.$rows['FullName'].'">
                      <input type="hidden" name="StudentNumber1" value="'.$rows['StudentNumber'].'">
                      <input type="hidden" name="Course1" value="'.$rows['Course'].'">
                      <input type="hidden" name="Bday1" value="'.$rows['Bday'].'">
                      <input type="hidden" name="ContactNumber1" value="'.$rows['ContactNumber'].'">
                      <input type="hidden" name="EmailAddress1" value="'.$rows['EmailAddress'].'">
                      <input type="hidden" name="password1" value="'.$rows['pass'].'">
                      <input type="hidden" name="image1" value="'.base64_encode($rows['image']).'">
                      '
                
                
                
                ;

                echo '<div class="infolabel"><h3>Name: </h3><div class="info"><h2>'.$rows['FullName']. "</h2></div></div>";
                echo '<div class="infolabel"><h3>Student #: </h3><div class="info"><h2>'.$rows['StudentNumber']. "</h2></div></div>";
                echo '<div class="infolabel"><h3>Course: </h3><div class="info"><h3>'.$rows['Course']. "</h3></div></div>";
                echo '<div class="infolabel"><h3>Date of Birth: </h3><div class="info"><h3>'.$rows['Bday']. "</h3></div></div>";
                echo '<div class="infolabel"><h3>Contact #: </h3><div class="info"><h3>'.$rows['ContactNumber']. "</h3></div></div>";
                echo '<div class="infolabel"><h3>Email Address: </h3><div class="info"><h3>'.$rows['EmailAddress']."</h3></div></div>";

                
            }

            echo '
            
            </form>

            <form method="post" action="profiledel.php">
            <div class="row">
                <div class="column">
                    <div class="loginpos">
                        <input type="button" onclick="history.go(-1);" value="Cancel" id="cancel" required/>
                    </div>
                </div>

                <div class="column">
                    <div class="loginpos">
                        <input type="hidden" name="StudentNumber" value="'.$studno.'">
                        <input type="submit" value="Delete" required/>
                    </div>
                </div>
            </div>

            </form>

            </div>';

            
        }


        $con->close(); 


// LOGOUT

    
?>



<!-- <form method="post">
        <input type="hidden" name="logout" value="1"/>
        <input type="button" value="logout"/>

    </form> -->

<body style= "<?php echo "
background: url($bglink) no-repeat;
background-attachment: fixed;
    background-size: cover;" ?>">
</body>
</html>