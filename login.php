<html>
<link rel="stylesheet" href="style.css">
<body>
<header>
<blockquote>
    <a href="index.php"><img src="image/logo.png"></a>
    <form class="hf" action="register.php"><input class="hi" type="submit" value="Register"></form>
</blockquote>
</header>
<blockquote>
<div class="container">
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