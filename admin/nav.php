<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <title>Navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-sm text-black">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="index.php"><img src="../img/logo2.png" style="width:100px; align :center;"></img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse menu" id="collapsibleNavbar" style = "margin : 0 0 0 250px;">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle m" href="#" role="button" data-bs-toggle="dropdown">Product</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Addproduct.php">Add Product</a></li>
            <li><a class="dropdown-item" href="Displayproduct.php">Display Product</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle m" href="#" role="button" data-bs-toggle="dropdown">Brand</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Addbrand.php">Add Brand</a></li>
            <li><a class="dropdown-item" href="Displaybrand.php">Display Brand</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle m" href="#" role="button" data-bs-toggle="dropdown">Shape</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Addshape.php">Add Shape</a></li>
            <li><a class="dropdown-item" href="Displayshape.php">Display Shape</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link m" href="order.php">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m" href="review.php">Reviews</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link m" href="user-info.php">User Info</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link m" href="feedback.php">Feedback</a>
        </li> 
      </ul>
    </div>
  </div>
  <div class="collapse navbar-collapse logo" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../user/logout.php"><img src="../img/ilog.png" style="margin:-5px 0 0 0;" width="55%"></a>
        </li>
    </ul>
    </div>
</nav>
</body>
</html>
