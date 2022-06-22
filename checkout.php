<?php

$uErr = $cErr = $cvvErr = $mErr = "";

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('./mysqli_connect.php');
    $hasErr = false;
    if (empty($_POST['username'])) {
        $uErr = "Please enter card owner name !";
        $hasErr = true;
    }
    if (empty($_POST['cardNumber'])) {
        $cErr = "Please enter card number !";
        $hasErr = true;
    } else {
        $regExp = '/^[0-9]{16}$/';
        $cno = strip_tags($_POST['cardNumber']);
        if(!preg_match($regExp, $cno)) {
            $cErr = "Please enter a valid card number !";
            $hasErr = true;
        }
    }
    if (empty($_POST['month'])) {
        $mErr = "Please enter valid expiry date !";
        $hasErr = true;
    } else {
        $m = strip_tags($_POST['month']);
        if($m < 1 || $m > 12) {
            $mErr = "Please enter a valid expiry month !";
            $hasErr = true;
        } else if (empty($_POST['year'])) {
            $cErr = "Please enter valid expiry date !";
            $hasErr = true;
        } else {
            $y = strip_tags($_POST['year']);
            if($y < 22) {
                $mErr = "Please enter a valid expiry year !";
                $hasErr = true;
            }
        }
    }
    
    if (empty($_POST['cvv'])) {
        $cvvErr = "Please enter a cvv number !";
        $hasErr = true;
    } else {
        $regExp = '/^[0-9]{3}$/';
        $cvvn = strip_tags($_POST['cvv']);
        if(!preg_match($regExp, $cvvn)) {
            $cvvErr = "Please enter a valid cvv number !";
            $hasErr = true;
        }
    }

    if(!$hasErr) {
        $username = strip_tags($_POST['username']);
        $userId = $_SESSION['id'];
        $bookId = $_SESSION['bookId'];
        $quantity = 1;

        $q = "INSERT INTO `bookinventoryorder`(`book_id`, `user_id`, `customer_name`, `quantity`) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($q);
        $stmt->bind_param("iisi", $bookId, $userId, $username, $quantity);
        $stmt->execute();
        $q2 = "UPDATE `bookinventory` SET quantity = (quantity - ".$quantity.") WHERE book_id = ".$bookId."";
        $stmt = $mysqli->prepare($q2);
        if($stmt->execute()) {
            header("Location:index.php");
        }
    }


}
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="style.css">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        background: url(https://www.nhslibrary.org/wp-content/uploads/bfi_thumb/bgr-banner-nnxtux8zaniv1g8qyrbxsuoi7hftbuzoympklz1hqo.png);
        background-size: cover;
    }
    nav { 
        width: 100%;
        margin: 0%;
        padding: 0%!important;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light py-9 col-md-12">
  <div class="container col-md-12"><a href="index.php" class="navbar-brand d-flex align-items-center"> <i class="fa fa-book fa-lg text-primary mr-2"></i><strong>Book Store</strong></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="logout.php" class="nav-link font-italic"> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>	
<div class="container py-5" style="width: 35%; margin-top:3%; margin-bottom:3%">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">Payment:</h1>
        </div>
    </div>
        <div class="col-lg-12 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form role="form" action="checkout.php" method="post">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" class="form-control " value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"> </div>
                                    <span class="error" style="color: red; font-size: 0.8em;"><?php echo $uErr;?></span><br><br>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control "value="<?php if (isset($_POST['cardNumber'])) echo $_POST['cardNumber']; ?>">
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                    <span class="error" style="color: red; font-size: 0.8em;"><?php echo $cErr;?></span><br><br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" name="month" placeholder="MM" name="" class="form-control" value="<?php if (isset($_POST['month'])) echo $_POST['month']; ?>"> <input type="number" name="year" placeholder="YY" name="" class="form-control" value="<?php if (isset($_POST['year'])) echo $_POST['year']; ?>"> </div>
                                            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $mErr;?></span><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" name="cvv" class="form-control" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>"> </div>
                                            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $cvvErr;?></span><br><br>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-dark">
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-sm-6 col-md-3 item">
                  <h3>Services</h3>
                  <ul>
                      <li><a href="#">Web design</a></li>
                      <li><a href="#">Development</a></li>
                      <li><a href="#">Hosting</a></li>
                  </ul>
              </div>
              <div class="col-sm-6 col-md-3 item">
                  <h3>About</h3>
                  <ul>
                      <li><a href="#">Company</a></li>
                      <li><a href="#">Team</a></li>
                      <li><a href="#">Careers</a></li>
                  </ul>
              </div>
              <div class="col-md-6 item text">
                  <h3>Company Name</h3>
                  <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
              </div>
              <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
          </div>
          <p class="copyright">Company Name © 2018</p>
      </div>
  </footer>
</div>
</body>
</html>