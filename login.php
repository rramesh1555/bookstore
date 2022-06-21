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
</style>
<body>
<object type="text/html" data="header.html" height = 8% width=100%></object>
<!-- <header>
<blockquote>
    <a href="index.php"><img src="image/logo.png"></a>
    <form class="hf" action="register.php"><input class="hi" type="submit" value="Register"></form>
</blockquote>
</header>
<blockquote> -->
<div class="container loginc">
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