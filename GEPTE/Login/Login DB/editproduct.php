<!DOCTYPE html>
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="stylereg.css">
</head>
<body>




    <div class = "login-container">
    <h2>Edit Product</h2>

    <?php
  
 
  $id = $_POST['id1'];
  $item = $_POST['item1'];
  $description = $_POST['description1'];
  $price = $_POST['price1'];

        
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
                     
        $query    = "SELECT image FROM products WHERE id = $id";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['id'] = $id;


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


    <form method="post" action="ed.php" enctype="multipart/form-data">


    <div class="row">
      <div class="column">
          <div class="user-box">
          <?php echo"   
                <input type='text' name='id' value='".$id."'required/>
                ";?>
            <label>Product ID</label>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
        <?php echo"   
                <input type='text' name='item' value='".$item."'required/>
                ";?>
            <label>Item Name</label>
        </div>
      </div>

    </div>

   
    <div class="row">

    <div class="column">
        <div class="user-box">
        <?php echo"
            <input type='file' name='image' id='image'  value=''>
              <label class='image'>Image</label>
            ";?>
        </div>
      </div>

      <div class="column">
        <div class="user-box">
        <?php echo"   
                <input type='number' name='price' value='".$price."'required/>
                ";?>
          <label>Price</label>
        </div>
      </div>

    </div>
  


    <div class="row">

    <div class="column">
        <div class="user-box">
          <!-- <input type="text" name="Bday" required/> -->
          <?php echo"   
              <input type='text' name='description' value='".$description."'required/>
              ";?>
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