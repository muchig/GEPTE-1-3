<!DOCTYPE html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require('dbconnect.php');
    session_start();

    if (isset($_POST['studno'])) {
        $stuno = stripslashes($_REQUEST['studno']);  
        $password = stripslashes($_REQUEST['password']);

        // $query    = "SELECT * FROM 'MyGuests' WHERE StudentNumber= $stuno
        //              AND pass= '$password' ";
                     
            $query    = "SELECT * FROM `myguests` WHERE StudentNumber = $stuno AND pass = '$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);

        print_r($rows['role']);
        
        if ($row == 1) {

            if($rows['role'] == 2){
                      header("Location: ./user-display.php");
            }
            elseif($rows['role'] == 1){
                      header("Location: ./display.php");
            }
      
            
        } else {
            echo "<h2 style='
                    text-align: center;
                    padding: 80px;
                    color: #f51d1d;
                    '> Invalid Login</h2>";
        }
    } else{

    }
?>


    <div class = "login-container">
    <h2>Login</h2>


    <!-- <form method="post" action="display.php"> -->
    
    <form class="form" method="post" name="index">
    <div class="user-box">
    <input type="text" name="studno" required/>
      <label>Student Number</label>
    </div>
        
    <div class="user-box">
    <input type="password" name="password" required/>
      <label>Password</label>
    </div>



    <div class="loginpos">
    <input type="submit" value="Login" required/>
    </div>
       

    </form>

    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
  
    </div>
   
</body>
</html>