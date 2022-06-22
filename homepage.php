<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Book House</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <i class="fa fa-book fa-lg text-primary mr-2"></i>
            <strong>The Book House</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link font-italic font-weight-bold" href="/"> Home </a></li>
                <li class="nav-item active"><a class="nav-link font-italic font-weight-bold" href="/about.html"> About us
                    </a></li>
                <li class="nav-item active"><a class="nav-link font-italic font-weight-bold" href="/list"> List </a>
                </li>
                <li class="nav-item active"><a class="nav-link font-italic font-weight-bold" href="/create"> Create </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
  <div class="jumbotron bg-cover text-white" style="background-image: url('../project/bookstore/image/bgbanner.jpg'); background-size: cover">
    <div class="container py-5 text-center">
        <app-header [content] = "pageContent.header"></app-header> 
        <p class="font-italic"></p><a class="btn btn-primary px-5" href="/list" role="button">Visit Our Book Room</a>
    </div>
    <div class="container py-5">
        <h2 class="h3 font-weight-bold">Explore Our House of Books</h2>
        <div class="row title-b">
            <div class="col-lg-10 mb-4">
                <p class="font-italic font-weight-bold text-muted">The Book House, established in 1942, is the oldest and biggest university library in Ontario and is situated adjacent to the University Senate Hall campus in the Toronto city. It stocks over 3,50,000 books (growing at 5000 titles annually) and subscribes to nearly 500 journals/ periodicals/ magazines. It also offers digital information services such as UGC Infonet. Among its special collections, the Ontario Studies is a unique one.</p>
                <p class="font-italic font-weight-bold text-muted">The special collections also include Women’s Studies, Government Publications, General Biographies, UN and World Bank Publications, bound volumes of newspapers and journals and rare books. It is the only library in Ontario which serves as a depository of UN and World Bank publications. The library is currently in the process of digitizing its rare collections.</p>
            </div>
        </div>
    </div>
</div>
</body>
<footer class="text-center text-lg-start bg-light text-muted">
  <section class="d-flex justify-content-center justify-content-lg-between"></section>
  <section>
      <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">The Book House</h6>
                  <p style="text-align:left">As readers, we know the joy that reading brings but we also know how
                      expensive new books can be.
                      That is why we strive to offer read-iculously low prices on great titles, so that the joy of
                      reading can be accessible to all.</p>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Menu</h6>
                  <p><a class="text-reset" href="/"> Home</a></p>
                  <p><a class="text-reset" href="/about">AboutUs</a></p>
                  <p><a class="text-reset" href="/list">List</a></p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                  <p><a class="text-reset" href="#!">Pricing</a></p>
                  <p><a class="text-reset" href="#!">Settings</a></p>
                  <p><a class="text-reset" href="#!">Orders</a></p>
                  <p><a class="text-reset" href="#!">Help</a></p>
              </div>
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fa fa-home me-3"></i> Toronto, Canada</p>
                  <p><i class="fa fa-envelope me-3"></i>info@bookhouse.com</p>
                  <p><i class="fa fa-phone me-3"></i> + 1 222 745 8118</p>
              </div>
          </div>
      </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">&copy; 2022 Copyright:<a
          class="text-reset fw-bold" href="https://mdbootstrap.com/"> BookHouse.com</a></div>
</footer>
</html>