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
        // $mysqli->query($sql);	
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
<style>
    body {
        background: url(https://www.nhslibrary.org/wp-content/uploads/bfi_thumb/bgr-banner-nnxtux8zaniv1g8qyrbxsuoi7hftbuzoympklz1hqo.png);
        background-size: cover;
    }
    .registerp {
        margin-top: 3%;
    }
    nav { 
        width: 100%;
        margin: 0%;
        padding: 0%!important;
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
<nav class="navbar navbar-expand-lg navbar-light bg-light py-9 col-md-12">
  <div class="container col-md-12"><a href="#" class="navbar-brand d-flex align-items-center"> <i class="fa fa-book fa-lg text-primary mr-2"></i><strong>Book Store</strong></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item active"><a href="#" class="nav-link font-italic"> Home </a></li> -->
        <!-- <li class="nav-item active"><a href="register.php" class="nav-link font-italic"> Register</a></li> -->
        <!-- <li class="nav-item active"><form class="hf" action="register.php"><input class="hi" type="submit" value="Register"></form></li> -->

      </ul>
    </div>
  </div>
</nav>
<!-- <header>
<blockquote>
	<a href="index.php"><img src="image/logo.png"></a>
</blockquote>
</header>
<blockquote> -->
<div class="container registerp" style="width: 30%;">
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