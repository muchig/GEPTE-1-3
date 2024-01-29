<?php
// PROTECTED PAGE
session_start();
// include 'users.php';
?>



<!DOCTYPE html>
<head>
   <title>Home Page</title>
   <link rel="stylesheet" href="style2.css">
</head>


<?php
$username = $_POST['username'];
$password = $_POST['password'];

error_reporting(E_ALL ^ E_WARNING); 
// START SESSION
// session_start();

// VERIFY THE LOGIN

//fran
// if (array_key_exists($username, $_SESSION['users'])){
//     if ($password == $_SESSION['users'][$username]['password']){
//         $message = "Welcome back, <br> " . strtoupper($username);
//         $img = $_SESSION['users'][$username]['img'];
//     }
//     else{
//         $message = "Username/Password incorrect";
//         $img = $_SESSION['users']['kingkong']['img'];
//     }
// }else{
//     $message = "User not found!";
//     $img = $_SESSION['users']['kingkong']['img'];

// }




if (array_key_exists( $username, $_SESSION['users'])){
    if ($password == $_SESSION['users'][$username]['password']){
        $img = $_SESSION['users'][ $username]['img'];
        $message = 'Welcome '.$username.'! <br> -King Kong';
        $bglink = 'images/black.jpg';
    }
    else{
        $message = 'Invalid User/Password <br> -King Kong';
        $username = 'kong';
        $img = $_SESSION['users'][$username]['img'];
        $bglink = 'images/red.jpg';
    }
}else{
    $message = 'User not found! <br> -King Kong';
    $username = 'king';
    $img = $_SESSION['users'][$username]['img'];
    $bglink = 'images/red.jpg';
}

// print_r($_SESSION['users']);
// LOGOUT
if (isset($_POST['logout'])) {
    unset($username);
}
if (!isset($username)) {
    header("Location: index.php");
    exit();
}


?>


<body style= "<?php echo "
background: url($bglink) no-repeat;
background-attachment: fixed;
    background-size: cover;" ?>">


    <div class="welcome">
    <h2><?php echo $message;?></h2>
    </div>
    
    <div class="profile">
    <img src="<?php echo $img;?>" alt="">
    </div>
    
    <!-- LOGOOUT -->
    <form method="post">
        <input type="hidden" name="logout" value="1"/>
        <input type="submit" value="logout"/>

    </form>
</body>
</html>