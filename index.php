<html>
<!-- <meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
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
</html>