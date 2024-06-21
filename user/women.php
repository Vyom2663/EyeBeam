<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/spec.css"> 
    <link rel="stylesheet" type="text/css" href="../css/index.css"> 
    <style>
      .a input{
        margin-left :20px;
      }
      .a{
        margin :5px 0;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="bgi">
<?php include("_navbar.php")?>
<h1>Woman Collection</h1>
</div>
<h6 style="margin: 10px 75px;"> <a href="index.php">Home </a> / Woman Collection</h6>
<div class="line"></div>
<form action="women.php" method="post" >
<div class="filter">
          <div class="nav-item dropdown" style="margin:0 0 0 25px;">
            <select id="shapelbl" name="shape" class="dd" required>
                <option class="dropdown-item" hidden>Shape</option>
                <option class="dropdown-item" value="Round">Round</option>
                <option class="dropdown-item" value="Rectangle">Rectangle</option>
                <option class="dropdown-item"value="Hexagonal">Hexagonal</option>
                <option class="dropdown-item"value="Square">Square</option>
                <option class="dropdown-item"value="Aviator">Aviator </option>
                <option class="dropdown-item"value="Clubmaster">Club master</option>
                <option class="dropdown-item"value="Cateye">Cat Eye </option>
                <option class="dropdown-item"value="Geomatric">Geomatric</option>
              </select>
          </div>
          <div class="nav-item dropdown" style="margin:0 0 0 0px;">
            <select id="colourlbl" name="colour" class="dd" require>
                <option class="dropdown-item" hidden>colour</option>
                <option class="dropdown-item" value="Black">Black</option>
                <option class="dropdown-item"value="Blue">Blue</option>
                <option class="dropdown-item"value="Grey">Grey</option>
                <option class="dropdown-item"value="Gold">Gold</option>
                <option class="dropdown-item"value="Green">Green </option>
                <option class="dropdown-item"value="Red">Red</option>
                <option class="dropdown-item"value="Purple">Purple</option>
                <option class="dropdown-item"value="Brown">Brown</option>
              </select>
          </div>
          <div class="nav-item dropdown" style="margin:0 0 0 0px;">
            <select id="shapelbl" name="size" class="dd" require>
                <option class="dropdown-item" hidden>Size</option>
                <option class="dropdown-item" value="Small">Small</option>
                <option class="dropdown-item"value="Medium">Medium</option>
                <option class="dropdown-item"value="Large">Large</option>
              </select>
          </div>
          
        <div>

          <button type="submit" name="btnFilter" class="dd1" style="width:185px;">Search</button>
        </div>
</div>
</form>

<div class="line"></div>
<div class="container my-3">
<div class="row">

<?php 
require_once("_productCard.php");    

if(isset($_POST['btnFilter'])){
    $shape = $_POST['shape'];
    $colour = $_POST['colour'];
    $size = $_POST['size'];
    echo'
    <div class="h text-center" style="margin:0;"> <h1> Searched Product </h1></div>';
  
    
    // $sql ="SELECT * FROM `product` WHERE `for`='Man' and `colour`='$colour' and `shape`='$shape' and `size`='$size' and `;";
    $sql ="SELECT * FROM `product` WHERE `for`='Woman' and `shape`='$shape' and `colour`='$colour' and `size`='$size'";
    
    $result = mysqli_query($con,$sql);

    if($result){
      while($row=mysqli_fetch_array($result)){
                        $pid = $row['pid'];
                        $pname = $row['pname'];
                        $price = $row['price'];
                        $size = $row['size'];
                        $description = $row['description'];
                        $image = $row['img11'];
                        $image2 = $row['img12'];
                        $max = $price * 2;
                        
                       component($pid,$pname,$price,$size,$description,$image,$image2,$max);
                    }   
                }
      
  }


?>

<?php 


					require_once('conn.php');
         if(isset($_POST['btnFilter'])){
          echo'
          <div class="h text-center" style="margin:0;"> <h1> Other Product </h1></div>';
         }
          $sql ="SELECT * FROM `product` WHERE `for`='Woman' order by rand();";

						$result = mysqli_query($con,$sql);

						if($result){
							while($row=mysqli_fetch_array($result)){
                                $pid = $row['pid'];
                                $pname = $row['pname'];
                                $price = $row['price'];
                                $size = $row['size'];
                                $description = $row['description'];
                                $image = $row['img11'];
                                $image2 = $row['img12'];
                                $max = $price * 2;
                                
                               component($pid,$pname,$price,$size,$description,$image,$image2,$max);
                            }   
                        }
?>

</div>
</div>
<!-- <div class="line"></div>
<div class="container my-3">
<div class="card" style="width:350px">
  <a href="../w/specs1.php">
  <div class="outer">  
    <img class="card-img-top" src="../img/women/1.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/1.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Black Full Rim Square Eyeglasses</h4>
      <p class="card-text">Size: Extra Wide</p>
      <p class="card-text"><span class="p">₹1199</span> <del>₹2000</del>
            <img src="../img/black.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
            <img src="../img/dark-blue.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
        </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px">
  <a href="../w/specs4.php">
  <div class="outer">  
  <img class="card-img-top" src="../img/women/2.2.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/2.2.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Blue Transparent Full Rim Cat Eye Eyeglasses</h4>
      <p class="card-text">Size: Narrow</p>
      <p class="card-text"><span class="p">₹999</span> <del>₹1499</del>
          <img src="../img/dark-blue.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/maroon.jpg" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
          <img src="../img/grey.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px">
  <a href="../w/specs6.php">
    <div class="outer">  
    <img class="card-img-top" src="../img/women/3.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/3.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
    <h4 class="card-title">Matte Black Gunmetal Full Rim Round Eyeglasses</h4>
      <p class="card-text">Size: Mediam</p>
      <p class="card-text"><span class="p">₹1699</span> <del>₹3000</del>
          <img src="../img/black.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/purple.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
          <img src="../img/mix.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
</div>
<div class="container my-3">
  <div class="card" style="width:350px">
  <a href="../w/specs9.php">
  <div class="outer">  
    <img class="card-img-top" src="../img/women/4.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/4.1.2.jpg" style="width:100%;">
    </div>
  </div>
      <div class="card-body">
      <h4 class="card-title">Gold Black Full Rim Geometric Eyeglasses</h4>
      <p class="card-text">Size: Wide</p>
      <p class="card-text"><span class="p">₹1199</span> <del>₹2000</del>
          <img src="../img/black.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/dark-blue.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
          <img src="../img/dark-green.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px;">
  <a href="../w/specs17.php">
  <div class="outer">  
    <img class="card-img-top" src="../img/women/8.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/8.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Blue Rimless Square Eyeglasses</h4>
      <p class="card-text">Size: Mediam</p>
      <p class="card-text"><span class="p">₹1700</span> <del>₹3000</del>
      <img src="../img/blue.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
        <img src="../img/black.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
        <img src="../img/grey.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
    </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px">
  <a href="../w/specs15.php">
  <div class="outer">  
  <img class="card-img-top" src="../img/women/5.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/5.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Golden Black Full Rim Square Eyeglasses</h4>
      <p class="card-text">Size: Medium</p>
      <p class="card-text"><span class="p">₹4199</span> <del>₹4999</del>
          <img src="../img/gold.jpg" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/rgold.jpg" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
</div>
<div class="container my-3">
  <div class="card" style="width:350px">
  <a href="../w/specs12.php">
  <div class="outer">  
    <img class="card-img-top" src="../img/women/6.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/6.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Golden Full Rim Cat Blue Eye Sunglasses</h4>
      <p class="card-text">Size: Mediam</p>
      <p class="card-text"><span class="p">₹1599</span> <del>₹2499</del>
          <img src="../img/Gold.jpg" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/dgrey.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
          <img src="../img/gold.jpg" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px;">
  <a href="../w/specs20.php">
    <div class="outer">  
    <img class="card-img-top" src="../img/women/9.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/9.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Gold Black Full Rim Round Sunglasses</h4>
      <p class="card-text">Size: Wide</p>
      <p class="card-text"><span class="p">₹1599</span> <del>₹3000</del>
      <img src="../img/gold.jpg" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
        <img src="../img/grey.png" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
    </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
  <div class="card" style="width:350px;">
  <a href="../w/specs22.php">
  <div class="outer">  
    <img class="card-img-top" src="../img/women/10.1.1.jpg" alt="Card image" style="width:100%;">
    <div class="inner">
    <img class="card-img-top" src="../img/women/10.1.2.jpg" style="width:100%;">
    </div>
  </div>
    <div class="card-body">
      <h4 class="card-title">Gunmetal Full Rim Hexagonal Sunglasses</h4>
      <p class="card-text">Size: Extra Narrow</p>
      <p class="card-text"><span class="p">₹2499</span> <del>₹4000</del>
          <img src="../img/grey.png" style="width:8%; border:solid 1px black; border-radius:50%; margin: 0 0 0 25px;"></img>
          <img src="../img/rgold.jpg" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
          <img src="../img/gold.jpg" style="width:8%; border:solid 1px black; border-radius:50%;"></img>
      </p>
      <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p>  
    </div>
    </a>
  </div>
</div>
</div> -->
<?php include("footer.php")?>
</body>
</html>