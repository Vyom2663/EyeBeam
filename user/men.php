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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="bgi">
<?php include("_navbar.php")?>
<h1>Man Collection</h1>
</div>
<h6 style="margin: 10px 75px;"> <a href="index.php">Home </a> / Man Collection</h6>
<div class="line"></div>
<form action="men.php" method="post" >
<div class="filter">
          <div class="nav-item dropdown" style="margin:0 0 0 20px;">
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
          <div class="nav-item dropdown" style="margin:0;">
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
          <div class="nav-item dropdown" style="margin:0;">
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
    $sql ="SELECT * FROM `product` WHERE `for`='Man' and `shape`='$shape' and `colour`='$colour' and `size`='$size'";
    
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
          $sql ="SELECT * FROM `product` WHERE `for`='Man' order by rand();";

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
<?php include("footer.php")?>
</body>
</html>