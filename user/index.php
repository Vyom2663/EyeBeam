<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <link rel="stylesheet" type="text/css" href="../css/spec.css"> 
    <title>Home</title>
</head>
<body>
<div class="bgi">
<?php 
session_start(); 
include("_navbar.php");
require_once("_productCard.php");    
?>

<h1>Home</h1>
</div>
<!-- <div>
<?php include("_Slider.php")?>
</div> -->
<?php 

  if(isset($_POST['btnSearch'])){
   echo'
    <div class="h text-center"> <h1> Searched Product </h1></div>
<div class="container my-3">
  <div class="row px-3">
    <div class="col-md-12">

    <div class="row">';

    if(isset($_POST['btnSearch'])){
         
 
					require_once('conn.php');
				    $searchProduct = $_POST['searchProduct'];
					  	$sql = "select * from product where pname LIKE '%$searchProduct%'";

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
echo'
</div>
</div></div>
</div>';
  
}
?>

<div class="h text-center"> <h1> Catagories </h1></div>
<div class="contain">
        <div class="category">
            <img src="../img/male-model4.png" alt="mm1">
            <div class="caption">
              <h3>MALE COLLECTION </h3>
              <p> 40% Discount </p>
              <a href="men.php"><button type="button" class="btn btn-outline-success butt" > VIEW PRODUCT </button></a>
            </div>
        </div>
        <div class="category">
            <img src="../img/female-model3.png" alt="fm1">
            <div class="caption">
              <h3>FEMALE COLLECTION</h3>
              <p>50 % - OFF </p>
              <a href="women.php"><button type="button" class="btn btn-outline-dark butt" > VIEW PRODUCT </button></a>
            </div>
        </div>
        <div class="category">
            <img src="../img/kid-model.png" alt="mm2">
            <div class="caption">
              <h3>KIDS COLLECTION </h3>
              <p> 80% Discount </p>
              <a href="kids.php"><button type="button" class="btn btn-outline-success butt"> VIEW PRODUCT </button></a>
            </div>
        </div>
</div>
<div class="h text-center"> <h1> Collection </h1></div>
<div class="container my-3">
  <div class="row px-3">
    <div class="col-md-12">

    <div class="row">
<?php 

                    // $sql = "SELECT `pid`, `pname`, `brand`, `price`, `quantity`, `for`, `catagory`, `size`, `description`, `img11`, `img21`, `img31` FROM `product` Where pid=11;"
 
					require_once('conn.php');
         
          $sql = "select * from product order by rand() LIMIT 6";

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
</div></div>
</div>
<img src="../img/vc.webp" alt="vc" style="width:100%;">

<div style="background-color : rgba(242, 242, 242, 0.898);">
<hr>
<div class="my-5 text-center" style="display:flex;"><div class="line3"></div> <h2> Hot Selling </h2><div class="line3"></div></div>
<?php


$reviews = 15;

$sql2 = "select * from ordered_item order by qty desc limit 0,1;";

$result2 = mysqli_query($con,$sql2);

if($result2){
  while($row=mysqli_fetch_array($result2)){
                    $pid = $row['pid'];
                    $pid = $row['oid'];
                    $pname = $row['pname'];
                    $price = $row['price'];
                    $size = $row['size'];
                    $colour = $row['colour'];
                    $image2 = $row['image'];
                    $max = $price * 1.5;
                   mostsoldproduct($pid,$pname,$price,$size,$image2,$reviews,$max,$colour);
                }   
              }
?>
</div>
<hr>
</div>
<!-- <img src="../img/up.webp" alt="vc" style="width:100%;"> -->
<div class="my-5">
<div class="my-5 text-center" style="display:flex;"><div class="line3"></div> <h2> Reviews </h2><div class="line3"></div></div>
<?php 
  
  $newsql="select * from review order by rand() LIMIT 3";
  $newquery=mysqli_query($con, $newsql);
  while($rows=mysqli_fetch_assoc($newquery)){
      
      $uid = $rows['uid'];
      $name = $rows['name'];
      $pid = $rows['pid'];
      $rtitle = $rows['title'];
      $comment = $rows['comment'];
      $ratings = $rows['ratings'];
      $posted = $rows['posted'];
      $img = $rows['img'];
      $date= new DateTime($rows['posted']) ;  
    
echo"      
<div class='review mx-5 mb-4'>
<img src='$img'>
<div class='dis'>
<b>$name</b>";
{
  if($ratings==5){
  echo"<div class='i' style='display :flex;'>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
  </div>";
}
  elseif($ratings==4){
  echo"<div class='i' style='display :flex;'>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
      <i class='fa-solid fa-star'></i>
  </div>";
}              
elseif($ratings==3){
echo"<div class='i' style='display :flex;'>
    <i class='fa-solid fa-star'></i>
    <i class='fa-solid fa-star'></i>
    <i class='fa-solid fa-star'></i>
</div>";
}
elseif($ratings==2){
echo"<div class='i' style='display :flex;'>
  <i class='fa-solid fa-star'></i>
  <i class='fa-solid fa-star'></i>
</div>";
}
else{
echo"<div class='i' style='display :flex;'>
<i class='fa-solid fa-star'></i>
</div>";
}
echo"
<b>$rtitle</b>
<p style='margin : 5px 0 0 0;'>$comment</p>
<span style='padding : 0 0 0 875px; color:grey;'>".$date->format('d-m-Y')."</span>      
</div>
</div>";
}
}

?>
</div>
<div class="article">
<hr>
<div class="my-5 text-center" style="display:flex;"><div class="line2"></div> <h2> Featured Article </h2><div class="line2"></div></div>
<div class="container my-3">
<div style="width:350px; margin: 0 10px;">
    <img src="../article/article3.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> WHY WEARING SUNGLASSES IN WINTER IS IMPORTANT </h5>
    <p>Eye-health experts contend that wearing sunglasses during the winter is more crucial than doing so during the summer months. Why?</p>
    <a href="../article/article1.php">Read More</a>
    </div>  
  </div>
  <div style="width:350px; margin: 0 10px;">
    <img src="../article/article5.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> SCARFACE SUNGLASSES: THE NEW LUXURY STANDARD </h5>
    <p>The Scarface Sunglasses are a new pair of sunglasses with the luxury standard. The frame is colored in gold, and the lenses are green in color.</p>
    <a href="../article/article2.php">Read More</a>
    </div>
  </div>
  <div style="width:350px; margin: 0 10px;">
    <img src="../article/article6.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> WHAT YOU NEED TO KNOW ABOUT SUNGLASS AND EYE PROTECTION </h5>
    <p>Sunglasses are a popular fashion accessory for many, but these days you'll find that sunglasses can also provide protection for your eyes against the sun's harmful UV rays.</p>
    <a href="../article/article3.php">Read More</a>
    </div>
  </div>
</div>
<div class="text-center mb-5">
<a href="../article/article.php"><button type="button" class="btn btn-outline-dark"> VIEW MORE ARTICLE </button></a>
</div>
<hr>
</div>
<?php include("footer.php")?>
</body>
</html>