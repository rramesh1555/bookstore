<html>
<!-- <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<style>
    body {
        background: url(https://www.nhslibrary.org/wp-content/uploads/bfi_thumb/bgr-banner-nnxtux8zaniv1g8qyrbxsuoi7hftbuzoympklz1hqo.png);
        background-size: cover;
    }
    .loginc {
        margin-top: 8%;
    }
    nav { 
        width: 100%;
        margin: 0%;
        padding: 0%!important;
    }

	table, tbody, tr, th, td{
    background-color: rgba(0, 0, 0, 0.0) !important;
	color: white;
	font-weight: bold;
	}

    img {
        height: 400px!important;
        width: 100px;
    }
}
</style>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>
<?php
session_start();
	$servername = "localhost:3307";
	$username = "root";
	$password = "root";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "USE bookstore";
	$conn->query($sql);	

	if(isset($_POST['payment'])) {
        $_SESSION['bookId']=$_POST['payment'];
		header("Location:checkout.php");

    }

	$sql = "SELECT * FROM bookinventory WHERE quantity > 0";
	$result = $conn->query($sql);
?>	

<?php
if(isset($_SESSION['id'])) {
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light py-9">
  <div class="container"><a href="#" class="navbar-brand d-flex align-items-center"> <i class="fa fa-book fa-lg text-primary mr-2"></i><strong>Book Store</strong></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active"><a href="logout.php" class="nav-link font-italic"> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php

	
}

if(!isset($_SESSION['id'])){
    header("Location:login.php");
}
// echo '<blockquote>';
// 	echo "<table id='myTable' style='width:100%; float:left'>";
// 	echo "<tr>";
//     $idx = 0;
//     while($row = $result->fetch_assoc()) {
// 	    echo "<td>";
// 	    echo "<table>";
// 	   	echo '<tr><td>'.'<img src="'.$row["image"].'"width="80%">'.'</td></tr><tr><td style="padding: 5px;">Title: '.$row["title"].'</td></tr><tr><td style="padding: 5px;">Author: '.$row["author"].'</td></tr><tr><td style="padding: 5px;">Type: '.$row["type"].'</td></tr><tr><td style="padding: 5px;">RM'.$row["price"].'</td></tr><tr><td style="padding: 5px;">
// 	   	<form action="index.php" method="post">
// 	   	<input type="hidden" value="'.$row['book_id'].'" name="payment"/>
// 	   	<input class="button" type="submit" value="Add to Cart"/>
// 	   	</form></td></tr>';
// 	   	echo "</table>";
// 	   	echo "</td>";
//         $idx = $idx + 1;
//         if($idx%4 == 0) {
//             echo "</tr>";
//         }
//     }
//     echo "</tr>";
//     echo "</table>";
?>
<div class="container-fluid">
  <div class="px-lg-5">
  <div class="row">
<?php
    while($row = $result->fetch_assoc()) {
        // echo '<div class="row">';
        // <!-- Gallery item -->
        echo '<div class="col-xl-3 col-lg-4 col-md-6 mb-4">';
        echo '<div class="bg-white rounded shadow-sm"><img src="'.$row["image"].'" alt="" class="img-fluid card-img-top">';
        echo    '<div class="p-4">';
        echo'    <h5>'.$row["title"].'</h5>';
        echo    '<p class="small text-muted mb-0"><strong>Price:</strong>'.$row["price"].'</p>';
        echo    '<div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">';
        // echo     '<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">JPG</span></p>';
        echo '<form action="index.php" method="post">';
        echo    '<input type="hidden" value="'.$row['book_id'].'" name="payment"/>';
        // echo     '<div class="badge badge-danger px-3 rounded-pill font-weight-normal">Add to card</div>';
        echo '<input class="button" type="submit" value="Add to Cart"/>';
        echo    '</div>';
        echo    '</div>';
        echo '</div>';
        echo '</div>';
    }
?>
    
      <!-- End -->

    </div>
    <!-- <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div> -->
  </div>
</div>

</body>
</html>