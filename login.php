<html>
<link rel="stylesheet" href="style.css">
<head>
<style>
.placeicon {
	font-family: fontawesome;
}

.custom-control-label::before {
	border: #dee2e6;    
    width: 100%; 
}
body {
    background-color: #f2f2f2;
}
.main-container {
    background-color: #f2f2f2 !important;
    margin: 0px;
    height:90%;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<header>
<!-- <blockquote> -->
    <!-- <a href="index.php"><img src="image/logo.png"></a> -->
<!-- </blockquote> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BookStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a> -->
      <!-- <a class="nav-item nav-link" href="#">Register</a> -->
    </div>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
    </div>
</nav>
</header>
<!-- <blockquote>
<div class="container">
<center><h1>Login</h1></center>
<form action="logincheck.php" method="post">
    Username:<br><input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
    <br><br>
    Password:<br><input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
    <br><br>
    <input class="button" type="submit" value="Login"/>
    <input class="button" type="button" name="cancel" value="Cancel" onClick="window.location='login.php';" />
</form>
</div>
<blockquote> -->

<div class="main-container">
  	<!-- Container containing all contents -->
  	<div class="container">
	  	<div class="row justify-content-center">
	  		<div class="col-12 col-md-9 col-lg-7 col-xl-6">
	  			<!-- White Container -->
			    <div class="container bg-white rounded mt-2 mb-2 px-0">
			    	<!-- Main Heading -->
				    <div class="row justify-content-center align-items-center pt-3">
				   		<h1><strong>Login</strong></h1>
					</div>

					<div class="pt-3 pb-3">
				   		<form class="form-horizontal" action="logincheck.php" method="post">
				   			<!-- User Name Input -->
			                <div class="form-group row justify-content-center px-3">
			                    <div class="col-9 px-0">
			                    	<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"placeholder="&#xf007; &nbsp; User name" class="form-control border-info placeicon">
			                    </div>
			                </div>

			                <!-- Password Input -->
			                <div class="form-group row justify-content-center px-3">
			                  	<div class="col-9 px-0">
			                    	<input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"placeholder="&#xf084; &nbsp; &#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control border-info placeicon">
			                  	</div>
			                </div>

			                <!-- Log in Button -->
			                <div class="form-group row justify-content-center">       
			                    <div class="col-3 px-3">
			                    	<input type="submit" value="Log in" class="btn btn-block btn-info">
			                    </div>
			                </div>

			            </form>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>


<?php
if(isset($_GET['errcode'])){
    if($_GET['errcode']==1){
        echo '<span style="color: red;">Invalid username or password.</span>';
    }elseif($_GET['errcode']==2){
        echo '<span style="color: red;">Please login.</span>';
    }
}
?>
</body>
</html>

