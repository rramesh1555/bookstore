<html>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
  <div class="container"><a href="#" class="navbar-brand d-flex align-items-center"> <i class="fa fa-book fa-lg text-primary mr-2"></i><strong>Book Store</strong></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item active"><a href="#" class="nav-link font-italic"> Home </a></li> -->
        <li class="nav-item active"><a href="register.php" class="nav-link font-italic"> Register</a></li>
        <!-- <li class="nav-item active"><form class="hf" action="register.php"><input class="hi" type="submit" value="Register"></form></li> -->

      </ul>
    </div>
  </div>
</nav>
<!-- <object type="text/html" data="header.html" height = 8% width=100%></object> -->
<!-- <header>
<blockquote>
    <a href="index.php"><img src="image/logo.png"></a>
    <form class="hf" action="register.php"><input class="hi" type="submit" value="Register"></form>
</blockquote>
</header>
<blockquote> -->
<div class="container loginc" style="width: 30%;">
<center><h1>Login</h1></center>
<form action="logincheck.php" method="post">
    Username:<br><input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
    <br><br>
    Password:<br><input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
    <br><br>
    <?php
        if(isset($_GET['errcode'])){
            if($_GET['errcode']==1){
                echo '<span style="color: red;">Invalid username or password.</span><br>';
            }
        }
    ?>
    <input class="button" type="submit" value="Login"/>
    <input class="button" type="button" name="cancel" value="Cancel" onClick="window.location='login.php';" />
</form>
</div>
<blockquote>
</body>
</html>