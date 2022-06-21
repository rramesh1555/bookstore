<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['username'])&&isset($_POST['password'])) {
        require('./mysqli_connect.php');
        $u = $_POST['username'];
        $p = $_POST['password'];		
        $q = "select * FROM users WHERE username = ? AND password = ?";
        $stmt = $mysqli->prepare($q);
        $stmt->bind_param('ss', $u, $p);		
        $stmt->execute();
        $result = $stmt->get_result();
        if ($stmt->affected_rows > 0) {
            while($user = $result->fetch_object()) {
                echo "v: ".$user->user_id;
                $_SESSION['id']=$user->user_id;
              }
            header("Location:index.php");
        } else {
            echo '<span style="color: red;">Login Fail</span>';
            header("Location:login.php?errcode=1");
        }
        $stmt->close();
        $mysqli->close();
        unset($mysqli);
    } else {
        echo '<span style="color: red;">Login Fail</span>';
        header("Location:login.php?errcode=1");
    }
}
?>