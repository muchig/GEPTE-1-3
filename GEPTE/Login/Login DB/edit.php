<!DOCTYPE html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="stylereg.css">
</head>
<body>




    <div class = "login-container">
    <h2>Edit Profile</h2>

    <?php
  
 
  $studno = $_POST['StudentNumber1'];
  $name = $_POST['FullName1'];
  $bday = $_POST['Bday1'];
  $course = $_POST['Course1'];
  $contactno = $_POST['ContactNumber1'];
  $email = $_POST['EmailAddress1'];
  $password = $_POST['password1'];
  $image = $_POST['image1'];

        
    // ?>

<?php
    
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");
  ?>
    
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

    // $studno = $_POST['Number'];

    // echo $studno;
                     
        $query    = "SELECT image FROM MyGuests WHERE StudentNumber = $studno";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['StudentNumber'] = $studno;


            echo '<div class="coninfo">';
            while($rows = $result->fetch_assoc())
            {
                echo '<img src="data:image;base64,'.base64_encode($rows['image']).'" alt="Image" style="width: 100px; height: 100px; margin: 10px; border: 3px solid black; border-radius: 100px;"/></br>';
              
               
            }

            echo '</div>';
        }


        $con->close(); 


// LOGOUT

    
?>

    <form method="post" action="edi.php" enctype="multipart/form-data">
    
    <div class="row">
        <div class="column">
            <div class="user-box">
                <?php echo"   
                <input type='text' name='StudentNumber' value='".$studno."'readonly/>
                  <label class='bday'>Student Number</label>
                ";?>
            </div>
        </div>

        <div class="column">
            <div class="user-box">
              <?php echo"   
              <input type='text' name='FullName' value='".$name."'required/>
                <label>Name</label>
              ";?>
            </div>
        </div>
    </div>
   
    <div class="row">
      <div class="column">
          <div class="user-box">
            <?php echo"
            <input type='date' name='Bday' class='form-control'  value='".$bday."'required/>
              <label class='bday'>Birthday</label>
            ";?>
        </div>
      </div>

      <div class="column">
          <div class="user-box">
            <?php echo"
            <input type='text' name='Course' value='".$course."'required/>
            <label>Course</label>
              ";?>
          </div>
      </div>
    </div>
    
   
    <div class="row">
      <div class="column">
        <div class="user-box">
            <?php echo"
            <input type='text' name='ContactNumber' value='".$contactno."'required/>
              <label>Contact Number</label>
            ";?>
        </div>
      </div>
      
      <div class="column">
        <div class="user-box">
            <?php echo"
            <input type='text' name='EmailAddress' value='".$email."'required/>
              <label>Email Address</label>
            ";?>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="column">
        <div class="user-box">
            <?php echo"
            <input type='password' name='password' value='".$password."'required/>
              <label>Password</label>
            ";?>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
            <?php echo"
            <input type='file' name='image' id='image'  value=''>
              <label class='image'>Image</label>
            ";?>
        </div>
      </div>
    </div>




    <div class="row"> 

    <div class="column">
      <div class="loginpos">
      <input type="button" onclick="history.go(-2);" value="Cancel" id="cancel" required/>
      </div>
    </div>

  

    <div class="column">
      <div class="loginpos">
      <input type="submit" value="Save Changes" required/>
      </div>
    </div>

   
    </div>

    

    
       

    </form>

    </div>



   
</body>
</html>