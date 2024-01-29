<!DOCTYPE html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="stylereg.css">
</head>
<body>




    <div class = "login-container">
    <h2>Add Product</h2>

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
    


    <form method="post" action="add.php" enctype="multipart/form-data">


    <div class="row">
      <div class="column">
          <div class="user-box">
            <input type="text" name="id" required/>
            <label>Product ID</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
            <input type="text" name="item" required/>
            <label>Item Name</label>
        </div>
      </div>

    </div>

   
    <div class="row">

    <div class="column">
        <div class="user-box">
          <input type="file" name="image" id="image" required/>
          <label class="image">Image</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
          <input type="number" name="price" required/>
          <label>Price</label>
        </div>
      </div>

    </div>
  


    <div class="row">

    <div class="column">
        <div class="user-box">
          <!-- <input type="text" name="Bday" required/> -->
          <input type="text" name="description" required/>
          <label>Description</label>
        </div>
      </div>

    </div>

    <div class="row"> 

        <div class="column">
        <div class="loginpos">
        <input type="button" onclick="history.go(-1);" value="Cancel" id="cancel" required/>
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