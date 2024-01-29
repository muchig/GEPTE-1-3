<!DOCTYPE html>
<html>

<head>
   <title>Home Page</title>
   <link rel="stylesheet" href="style3.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
</head>
<body>

<ul>
    <li><a class="active">Products</a></li>
    <li><a href= "../php-restaurant.1/index.html">Reservations</a></li>
</ul>

<!-- <form action="" method="POST" enctype="multipart/form-data"> -->
<div class="welcome">
    <h2><?php echo "Products";?></h2>
    
    </div>


    <!-- <div class="container">     

      <div class="pagination">
          <li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
          <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
          <li class="page-item dots"><a class="page-link" href="#">...</a></li>
          <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
          <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
          <li class="page-item dots"><a class="page-link" href="#">...</a></li>
          <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
          <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
        </div>
    </div> -->

    <!-- <div class="card">
        
        <div class="photo">
            <a href="profile.php">
            <img src="images/nyc.jpeg" alt="hellosos">
            </a>
        </div>    
        <div class="cardinfo">
            <div class="item">
                <h3>Pepperoni</h3>
            </div>
            <div class="desc">
              <p> A true classic- pepperoni and mozzarella cheese on our signature pizza sauce.</p>
            </div>
            <div class="price">
                <h3>380.00</h3>
            </div>
        </div>
    </div> -->


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

$sql = "SELECT id, item, description, price, image FROM products ORDER BY id + 0 ASC";
$result = $conn->query($sql);



echo '

<div class="container">     
<div class="row" style="display: flex; flex-direction: row;">

';

   // output data of each row
   while($row = $result->fetch_assoc()) {


    // $_SESSION['StudentNumber'] = $row['StudentNumber'];

    echo
    
    ' 
    
  
    <div class="card">
    <form method="post" action="" style="overflow: hidden; height: 450px; ">
        <div class="photo">
                <a href="">
                
               <input style="padding: 0;" type="hidden" name="id1" value='. $row["id"].'> <input type="image" id="img" src="data:image;base64,'.base64_encode($row['image']).'" alt='.$row["item"].'  value='.$row["id"].'/>
               
                </a>
                
            </div>    
            <div class="cardinfo">
                <div class="item">
                <input style="padding: 0;" type="hidden" name="item1" value="'. $row["item"].'">
                    <h3>'.$row["item"].'</h3>
                </div>
                <div class="desc">
                <input style="padding: 0;" type="hidden" name="description1" value="'. $row["description"].'">
                <p>'.$row["description"].'</p>
                </div>
                <div class="price">
                <input style="padding: 0;" type="hidden" name="price1" value='. $row["price"].'>
                    <h3>'.$row["price"].'</h3>
                </div>
            </div>
            </form>
        </div>';

    // base64_encode($row['image'])

    

    
}

$conn->close(); 


echo'



</div>
<div class="row">
<div class="pagination">
<li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
<li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
<li class="page-item dots"><a class="page-link" href="#">...</a></li>
<li class="page-item current-page"><a class="page-link" href="#">5</a></li>
<li class="page-item current-page"><a class="page-link" href="#">6</a></li>
<li class="page-item dots"><a class="page-link" href="#">...</a></li>
<li class="page-item current-page"><a class="page-link" href="#">10</a></li>
<li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
</div>
</div>
</div>

';



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
    <form method="post">
        <input type="hidden" name="logout" value="1"/>
        <input type="submit" value="logout"/>

    </form>

<body style= "<?php echo "
background: url($bglink) no-repeat;
background-attachment: fixed;
    background-size: cover;" ?>">


<script type="text/javascript">
function getPageList(totalPages, page, maxLength){
  function range(start, end){
    return Array.from(Array(end - start + 1), (_, i) => i + start);
  }

  var sideWidth = maxLength < 9 ? 1 : 2;
  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
  var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

  if(totalPages <= maxLength){
    return range(1, totalPages);
  }

  if(page <= maxLength - sideWidth - 1 - rightWidth){
    return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
  }

  if(page >= totalPages - sideWidth - 1 - rightWidth){
    return range(1, sideWidth).concat(0, range(totalPages- sideWidth - 1 - rightWidth - leftWidth, totalPages));
  }

  return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
}

$(function(){
  var numberOfItems = $(".container .card").length;
  var limitPerPage = 3; //How many card items visible per a page
  var totalPages = Math.ceil(numberOfItems / limitPerPage);
  var paginationSize = 7; //How many page elements visible in the pagination
  var currentPage;

  function showPage(whichPage){
    if(whichPage < 1 || whichPage > totalPages) return false;

    currentPage = whichPage;

    $(".container .card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

    $(".pagination li").slice(1, -1).remove();

    getPageList(totalPages, currentPage, paginationSize).forEach(item => {
      $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
      .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
      .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page");
    });

    $(".previous-page").toggleClass("disable", currentPage === 1);
    $(".next-page").toggleClass("disable", currentPage === totalPages);
    return true;
  }

  $(".pagination").append(
    $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Prev")),
    $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({href: "javascript:void(0)"}).text("Next"))
  );

  $(".card-content").show();
  showPage(1);

  $(document).on("click", ".pagination li.current-page:not(.active)", function(){
    return showPage(+$(this).text());
  });

  $(".next-page").on("click", function(){
    return showPage(currentPage + 1);
  });

  $(".previous-page").on("click", function(){
    return showPage(currentPage - 1);
  });
});
</script>
      

</body>
</html>