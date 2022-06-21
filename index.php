<html>
<!-- <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<body>
<?php
session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "USE bookstore";
	$conn->query($sql);	

	$sql = "SELECT * FROM books";
	$result = $conn->query($sql);
?>	

<?php
if(isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo.png"></a>';
	echo '<form class="hf" action="logout.php"><input class="hi" type="submit" name="submitButton" value="Logout"></form>';
	echo '<form class="hf" action="edituser.php"><input class="hi" type="submit" name="submitButton" value="Edit Profile"></form>';
    echo '<form class="hf" action="cart.php"><input class="hi" type="submit" name="submitButton" value="Cart"></form>';
	echo '</blockquote>';
	echo '</header>';
}

if(!isset($_SESSION['id'])){
    header("Location:login.php");
}
echo '<blockquote>';
	echo "<table id='myTable' style='width:100%; float:left'>";
	echo "<tr>";
    $idx = 0;
    while($row = $result->fetch_assoc()) {
	    echo "<td>";
	    echo "<table>";
	   	echo '<tr><td>'.'<img src="'.$row["image"].'"width="80%">'.'</td></tr><tr><td style="padding: 5px;">Title: '.$row["title"].'</td></tr><tr><td style="padding: 5px;">ISBN: '.$row["isbn"].'</td></tr><tr><td style="padding: 5px;">Author: '.$row["author"].'</td></tr><tr><td style="padding: 5px;">Type: '.$row["type"].'</td></tr><tr><td style="padding: 5px;">RM'.$row["price"].'</td></tr><tr><td style="padding: 5px;">
	   	<form action="cart.php" method="post">
	   	Quantity: <input type="number" value="1" name="quantity" style="width: 20%"/><br>
	   	<input type="hidden" value="'.$row['book_id'].'" name="ac"/>
	   	<input class="button" type="submit" value="Add to Cart"/>
	   	</form></td></tr>';
	   	echo "</table>";
	   	echo "</td>";
        $idx = $idx + 1;
        if($idx%4 == 0) {
            echo "</tr>";
        }
    }
    echo "</tr>";
    echo "</table>";
?>
</body>
<footer class="text-center text-lg-start bg-light text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between"></section>
  <section>
      <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">The Book House</h6>
                  <p style="text-align:left">As readers, we know the joy that reading brings but we also know how
                      expensive new books can be.
                      That is why we strive to offer read-iculously low prices on great titles, so that the joy of
                      reading can be accessible to all.</p>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Menu</h6>
                  <p><a class="text-reset" href="/"> Home</a></p>
                  <p><a class="text-reset" href="/about">AboutUs</a></p>
                  <p><a class="text-reset" href="/list">List</a></p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                  <p><a class="text-reset" href="#!">Pricing</a></p>
                  <p><a class="text-reset" href="#!">Settings</a></p>
                  <p><a class="text-reset" href="#!">Orders</a></p>
                  <p><a class="text-reset" href="#!">Help</a></p>
              </div>
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fa fa-home me-3"></i> Toronto, Canada</p>
                  <p><i class="fa fa-envelope me-3"></i>info@bookhouse.com</p>
                  <p><i class="fa fa-phone me-3"></i> + 1 222 745 8118</p>
              </div>
          </div>
      </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">&copy; 2022 Copyright:<a
          class="text-reset fw-bold" href="https://mdbootstrap.com/"> BookHouse.com</a></div>
</footer>
</html>