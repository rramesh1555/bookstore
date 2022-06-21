<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password);
$sql = "USE bookstore";
$conn->query($sql);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['ac'])) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    
        $sql = "USE bookstore";
        $conn->query($sql);
    
        $sql = "SELECT * FROM books WHERE book_id = '".$_POST['ac']."'";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            $bookID = $row['book_id'];
            $quantity = $_POST['quantity'];
            $price = $row['price'];
            $userId = $_SESSION["id"];
        }
        // echo "".$bookID.", ".$quantity.", ".$price;
        $sql = "INSERT INTO cart(`book_id`, `user_id`, `quantity`, `price`, `total_price`) VALUES('".$bookID."', ".$userId.", ".$quantity.", ".$price.", $price * $quantity)";
        $conn->query($sql) or die($conn->error);;
        echo "completed";
    }

    if(isset($_POST['dc'])) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    
        $sql = "USE bookstore";
        $conn->query($sql);
    
        $sql = "DELETE FROM cart WHERE cart_id = ".$_POST['dc'];
        $result = $conn->query($sql);
    }
}
?>
<body>
<?php
    $userId = $_SESSION["id"];
	$sql = "SELECT * FROM cart c JOIN books b on c.book_id = b.book_id WHERE `user_id` = ".$userId;
	$result = $conn->query($sql)or die($conn->error);
?>	

<?php
if(isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo.png"></a>';
	echo '<form class="hf" action="logout.php"><input class="hi" type="submit" name="submitButton" value="Logout"></form>';
	echo '<form class="hf" action="edituser.php"><input class="hi" type="submit" name="submitButton" value="Edit Profile"></form>';
    echo '<form class="hf" action="#"><input class="hi" type="submit" name="submitButton" value="Cart"></form>';
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
	   	echo '<tr><td>'.'<img src="'.$row["image"].'"width="80%">'.'</td></tr><tr><td style="padding: 5px;">Title: '.$row["title"].'</td></tr><tr><td style="padding: 5px;">RM'.$row["price"].'</td></tr><tr><td style="padding: 5px;">
	   	<form action="cart.php" method="post">
        Quantity:'.$row["quantity"].'<br><br>
	   	<input type="hidden" value="'.$row['cart_id'].'" name="dc"/>
	   	<input class="button" type="submit" value="Remove"/>
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