<?php
$fnameErr = $lnameErr = $emailErr = $genderErr = $icErr = $contactErr = $unameErr = $passwordErr = "";
$hasErr = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('./mysqli_connect.php');
    if (empty($_POST['fname'])) {
        $fnameErr = "Please enter first name !";
        $hasErr = true;
    }
    if (empty($_POST['lname'])) {
        $lnameErr = "Please enter last name !";
        $hasErr = true;
    }
    if (empty($_POST['uname'])) {
        $unameErr = "Please enter username !";
        $hasErr = true;
    } else {
        $uname = strip_tags($_POST['uname']);
        $mysqli->query($sql);	
        $sql = "SELECT * FROM users WHERE username = '".$uname."'";
        $r = $mysqli->query($sql);
        if($r){
            $num = $r->num_rows;
            if ($num > 0) { 
                $unameErr = "Username already exist !";
                $hasErr = true;
                $r->free();
                unset($r);
            }
        }
    }
    if (empty($_POST['password'])) {
        $passwordErr = "Please enter password !";
        $hasErr = true;
    } else {
        $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{7,20}$/';
        $password = strip_tags($_POST['password']);
        if(!preg_match($pattern, $password)){
            $passwordErr = "Password must be longer than 6 characters including at least one number, one capital letter and one special character";
            $hasErr = true;
         }
    }
    if (empty($_POST['email'])) {
        $emailErr = "Please enter email !";
        $hasErr = true;
    } else {
        $email = strip_tags($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Please enter a valid email !";
            $hasErr = true;
       } else {
            $email = strip_tags($_POST['email']);
            $mysqli->query($sql);	
            $sql = "SELECT * FROM users WHERE email = '".$email."'";
            echo $sql;
            $r = $mysqli->query($sql);
            if($r){
                $num = $r->num_rows;
                if ($num > 0) { 
                    $emailErr = "Email already exist !";
                    $hasErr = true;
                    $r->free();
                    unset($r);
                }
            }

       }
    }
    if (empty($_POST['contact'])) {
        $contactErr = "Please enter contact number !";
        $hasErr = true;
    } else {
        $mobile = strip_tags($_POST['contact']);
        if(!preg_match('/^[0-9]{10}+$/', $mobile)) {
            $contactErr = "Please enter a valid mobile number ! (example: 2123458983)";
            $hasErr = true;
        }
    }
    if(!$hasErr) {
        $fname = strip_tags($_POST['fname']);
        $lname = strip_tags($_POST['lname']);
        $username = strip_tags($_POST['uname']);
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);
        $contact = strip_tags($_POST['contact']);

        $servername = "localhost:3307";
        $dbusername = "root";
        $dbpassword = "root";
        $conn = new mysqli($servername, $dbusername, $dbpassword);
        $sql = "USE bookstore";
        $conn->query($sql);

        $q = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`, `email`, `mobile_no`) VALUES (?, ?, ?, ?, ?, ?)";
        // echo $sql;
        $stmt = $conn->prepare($q);
        $stmt->bind_param("sssssi", $fname, $lname, $username, $password, $email, $contact);
        echo "Form Successfully submited";
        // echo $stmt;
        $stmt->execute();
        $stmt->close();
        header("Location:login.php");
        // $conn->query($sql) or die($conn->error);
    }
}

?>
<html>
<link rel="stylesheet" href="style.css">
<body>
<header>
<blockquote>
	<a href="index.php"><img src="image/logo.png"></a>
</blockquote>
</header>
<blockquote>
<div class="container">
<form method="post"  action="register.php">
	<h1>Register new user:</h1>
	First Name:<br><input type="text" name="fname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $fnameErr;?></span><br><br>

    Last Name:<br><input type="text" name="lname" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $lnameErr;?></span><br><br>

	User Name:<br><input type="text" name="uname" value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $unameErr;?></span><br><br>

	New Password:<br><input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

	E-mail:<br><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

	Mobile Number:<br><input type="text" name="contact" value="<?php if (isset($_POST['contact'])) echo $_POST['contact']; ?>">
	<span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br>

	<input class="button" type="submit" name="submitButton" value="Sign-up">
	<input class="button" type="button" name="cancel" value="Cancel" onClick="window.location='login.php';" />
</form>
</div>
</blockquote>
</center>
</body>
</html>