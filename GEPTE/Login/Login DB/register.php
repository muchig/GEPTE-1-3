<!DOCTYPE html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="stylereg.css">
</head>
<body>




    <div class = "login-container">
    <h2>Register</h2>

    <?php
    // session_start();
    // include "reg.php";
    // if (isset($failed)) {echo "<h3  
    //     style = 
    //     margin: 0 0 30px;
    //     padding: 0;
    //     color: #fff;
    //     text-align: center;>

    //     INVALID USER/PASSWORD

    //     </h3>";}

    // print_r($_SESSION['users']);
        
    // ?>
    


    <form method="post" action="reg.php" enctype="multipart/form-data">


    <div class="row">
      <div class="column">
          <div class="user-box">
            <input type="text" name="StudentNumber" required/>
            <label>Student Number</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
            <input type="text" name="FullName" required/>
            <label>Name</label>
        </div>
      </div>

    </div>

   
    <div class="row">
      <div class="column">
        <div class="user-box">
          <!-- <input type="text" name="Bday" required/> -->
          <input type="date" name="Bday" class="form-control" required/>
          <label class="bday">Birthday</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
          <input type="text" name="Course" required/>
          <label>Course</label>
        </div>
      </div>

    </div>
  

   
    <div class="row">
      <div class="column">
        <div class="user-box">
          <input type="text" name="ContactNumber" required/>
          <label>Contact Number</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
          <input type="text" name="EmailAddress" required/>
          <label>Email Address</label>
        </div>
      </div>

    </div>
 

   



    <div class="row">
      <div class="column">
        <div class="user-box">
          <input type="password" name="password" required/>
          <label>Password</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
          <input type="file" name="image" id="image" required/>
          <label class="image">Image</label>
        </div>
      </div>

    </div>


    <div class="loginpos">
    <input type="submit" value="Register" required/>
    </div>
       

    </form>

    <p class="message">Already have an account? <a href="index.php">Log in</a></p>
  
    </div>



   
</body>
</html>