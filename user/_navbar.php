<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-sm text-black">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="../user/index.php"><img src="../img/logo2.png" style="width:100px; align :center;"></img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse menu" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link m" href="../user/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link m" href="../user/about.php">About Us</a>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle m" href="#" role="button" data-bs-toggle="dropdown">Eyewears</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../user/men.php">Man</a></li>
            <li><a class="dropdown-item" href="../user/women.php">Woman</a></li>
            <li><a class="dropdown-item" href="../user/kids.php">Kids</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link m" href="service.php">Service Center</a>
        </li>  -->
        <li class="nav-item">
          <a class="nav-link m" href="../user/OrderDetail.php">My Orders</a>
        </li> 
        
        <li class="nav-item">
          <a class="nav-link m" href="../user/contactus.php">Contact Us</a>
        </li> 
      </ul>
    </div>
  </div>
  <div class="collapse navbar-collapse logo" id="collapsibleNavbar">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin:-3px -2px 0 0;"><img src="../img/search2.png" style="width:19px;"></img></a>
        </li>
        <?php include("_cartCount.php");
        
        if(isset($_SESSION['loggedin'])){
          $uid=$_SESSION['uid'];

          $uname = $_SESSION['uname'];
          $sql = "select * from user where uid = $uid";

						$result = mysqli_query($con,$sql);

						if($result){
						    $row=mysqli_fetch_array($result);
                                // $pid = $row['pid'];
                                $image = $row['image'];
                                $phone = $row['phone'];
                                $email = $row['email'];
                        }

  
          
          echo"<li class='nav-item'>
        <!-- <a class='nav-link' href='Login.php'><img src='../img/ilog.png' onclick='toggleMenu()' style='margin:-5px 0 0 0;'></a> -->
          <img src='$image' onclick='toggleMenu()' style='margin:5px 0 0 10px; border-radius:50%;'>
        </li>
        <div class='sub-menu-wrap' id='submenu'>
          <div class='sub-menu'>
            <div class='user-info'>
              <img src='$image'>
              <h3>$uname</h3>
            </div>
            <hr>
            <a href='#' class='sub-menu-link'>
              <i class='fa-solid fa-mobile' style='color :black;'></i>
              <p>+91 $phone</p>
            </a>
            <a href='#' class='sub-menu-link'>
            <i class='fa-solid fa-envelope' style='color :black;'></i>
              <p>$email</p>
            </a>
            <a href='EditProfile.php' class='sub-menu-link'>
            <i class='fa-solid fa-user-pen' style='color :black;'></i>
              <p>Edit Profile</p>
            </a>
            <a href='logout.php' class='sub-menu-link'>
            <i class='fa-solid fa-right-from-bracket' style='color :black;'></i>
              <p>LogOut</p>
            </a>
          </div>
        </div>";
        }
        else{
          echo'<a href="Login.php"><img src="../img/ilog.png" style="margin:5px 0 0 10px;"></a>';
        }

        ?>
    </ul>
    </div>
</nav>
<script>
  let submenu = document.getElementById("submenu");
    function toggleMenu(){
      submenu.classList.toggle("open-menu");
    }
</script>

<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="Post">
      <div class="modal-body">
        <input type="text" style="width:100%; padding:5px 0;" name="searchProduct">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btnSearch">Search</button>
      </div>
  </form>
    </div>
  </div>
</div>
</body>
</html>
