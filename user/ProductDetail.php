<?php

session_start();
require_once('conn.php');
require_once('_navbar.php');

$pid = $_GET['pid'];
$sql = "select * from product where pid = $pid";

						$result = mysqli_query($con,$sql);

						if($result){
						    $row=mysqli_fetch_array($result);
                                // $pid = $row['pid'];
                                $pname = $row['pname'];
                                $price = $row['price'];
                                $brand = $row['brand'];
                                $for = $row['for'];
                                $qty = $row['quantity'];
                                $size = $row['size'];
                                $type = $row['type'];
                                $colour = $row['colour'];
                                $shape = $row['shape'];
                                $material = $row['material'];
                                $description = $row['description'];
                                $image = $row['img11'];
                                $image2 = $row['img12'];
                                $image3 = $row['img13'];
                                $image4 = $row['img14'];
                                $image5 = $row['img15'];
                                $image6 = $row['img16'];
                                $max = $price * 1.5;

                        }

                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/sp.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <script type="text/javascript">
      function increaseCount(a, b) {
      var input = b.previousElementSibling;
      var value = parseInt(input.value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      input.value = value;
    }

    function decreaseCount(a, b) {
      var input = b.nextElementSibling;
      var value = parseInt(input.value, 10);
      if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
      }
    }
    </script>
    <style>
      #p{
        font-size :25px;
      }
    </style>
</head>
<body>
<form action="Cart.php" method="post" >
<div class="row mt-3">
<div class="col-sm-6 col-md-6 col-lg-8">
<div class="con">
  <div class="i1">
      <img src="../admin/<?php echo $image ?>" style="padding: 50px 0;">
      <input type="hidden" name="pro_img1" value="<?php echo $image; ?>">
      
  </div>
  <div class="i1">
    <img src="../admin/<?php echo $image2 ?>" style="padding: 50px 0;">
    <input type="hidden" name="pro_img2" value="<?php echo $image2; ?>">

  </div>
</div>
<div class="con">
  <div class="i1">
      <img src="../admin/<?php echo $image3 ?>">
      <input type="hidden" name="pro_img3" value="<?php echo $image3; ?>">

  </div>
  <div class="i1">
      <img src="../admin/<?php echo $image4 ?>">
      <input type="hidden" name="pro_img4" value="<?php echo $image4; ?>">

  </div>
</div>


<div class="con">
  <div class="i1">
    <img src="../admin/<?php echo $image5 ?>" style="padding: 50px 0;">
    <input type="hidden" name="pro_img5" value="<?php echo $image5; ?>">

  </div>
  <div class="i1">
    <img src="../admin/<?php echo $image6 ?>" style="padding: 50px 0;">
    <input type="hidden" name="pro_img6" value="<?php echo $image6; ?>">
  </div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-4">
  <div class="card-body">
    <h4 class="card-title"><?php echo $pname; ?></h4>
    <input type="hidden" name="pro_name" value="<?php echo $pname; ?>">
      <p class="card-text"><span id="p">₹<?php echo $price; ?></span> ₹<del><?php echo $max; ?></del></p>
    <input type="hidden" name="pro_price" value="<?php echo $price; ?>">
    <p class="card-text" style="margin:-10px 0 0 0;">Frame + Lens</p> 
  </div>
  <div style="padding:5px 0 0 7px;">
    <p>Quantity :</p>
    <div class="counter">
        <span class="down" onClick='decreaseCount(event, this)'>-</span>
        <input type="text" value="1" name="pro_qty">
        <span class="up"  onClick='increaseCount(event, this)'>+</span>
      </div>
  </div>
  <div class="bt">
    <button type="submit" name="AddtoCart">Add to Cart</button>
    <input type= "hidden" name = "pro_id" value = "<?php echo $pid;?>">
    <!-- <button type="submit" name ="BuyNow"><a href='Order.php?pid=<?php echo $pid;?>' style="color:black; text-decoration :none;">Buy Now</a></button> -->
  </div>

  <div class="mt-3">
    <h4>Product Information :</h4>
    <p style="border:0.5px solid black; width:222px;"></p>
    <p><span style="font-weight: 600;">Brand Name : </span><?php echo $brand; ?></p>
    <input type="hidden" name="pro_brand" value="<?php echo $brand; ?>">
    
    <p><span style="font-weight: 600;">Product Type : </span><?php echo $type; ?></p>
    <input type="hidden" name="pro_type" value="<?php echo $type; ?>">
    
    <p><span style="font-weight: 600;">Frame Shape : </span><?php echo $shape; ?></p>
    <input type="hidden" name="pro_shape" value="<?php echo $shape; ?>">

    <p><span style="font-weight: 600;">Frame colour : </span><?php echo $colour; ?></p>
    <input type="hidden" name="pro_colour" value="<?php echo $colour; ?>">

    <p><span style="font-weight: 600;">Frame Size : </span><?php echo $size; ?></p>
    <input type="hidden" name="pro_size" value="<?php echo $size; ?>">

    <p><span style="font-weight: 600;">Material : </span><?php echo $material; ?></p>
    <input type="hidden" name="pro_material" value="<?php echo $material; ?>">
    
    <p><span style="font-weight: 600;">For : </span><?php echo $for; ?></p>
    <input type="hidden" name="pro_for" value="<?php echo $for; ?>">

    <p><span style="font-weight: 600;">Description : </span><?php echo $description; ?></p>
    <input type="hidden" name="pro_for" value="<?php echo $description; ?>">


  </div>
  <p style="border:0.5px solid black; width:375px;"></p>
  <h6 class="ms-3 mb-3 text-center">Free Shipping | 1 Year Warranty</h6>
  <p style="border:0.5px solid black; width:375px;"></p>
</div>
</div>
</form>
<hr>
<img src="../img/vc.webp" alt="vc" style="width:100%;">
<hr>
<div class="d-flex">
<div class="review-form">
    <form action="ProductReview.php" method="post" enctype="multipart/form-data">
      <h3>Write a Review</h3>
      <h6 style="margin : 10px 0 5px 0;">Rating</h6>
      
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ratings" id="ratings" value="1" required >
                <label class="form-check-label" for="ratings" name = "1"> 1 </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ratings" id="ratings" value="2" required>
                <label class="form-check-label" for="ratings" name="2">2</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ratings" id="ratings" value="3" required>
                <label class="form-check-label" for="ratings" name="3">3</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ratings" id="ratings" value="4" required> 
                <label class="form-check-label" for="ratings" name="4">4</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ratings" id="ratings" value="5" required>
                <label class="form-check-label" for="ratings" name="5">5</label>
                </div>
                
      <h6 style="margin : 10px 0 10px 0;">Review Title</h6>
      <input name="rtitle" type="text" class="rt" placeholder="WOW ! Nice Glasses .. ">
      <h6 style="margin : 15px 0 10px 0;">Review</h6>
      <textarea name="review" id="" cols="50" rows="5"></textarea>
      <input type="file" class="form-control" accept="image/jpeg, image/png, image/jpg" name="rimg" style="margin:10px 0 0 190px;"></input>
      <div class="my-3">
        <button type="submit" class="btn btn-outline-primary px-5 py-2" name="btnCancel">Cancle Review</button>
        <button type="submit" class="btn btn-primary px-5 py-2" name="btnReview">Submit Review</button>
        <input type= "hidden" name = "pro_id" value = "<?php echo $pid;?>">

      </div>
    </form>

  </div>
  <div class="sizechart">
  <button id="btnimg" type="submit" value="submit"></button>
  <img id="sizeimg" class="sc" src="../img/size.webp" alt="size chart">
  </div>
</div>
<hr>
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
<div class='review mx-5 my-4'>
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
<?php include("footer.php")?>

<script>
  const button = document.getElementById("btnimg");
  const img = document.getElemetById("sizeimg");

  img.style.display = "none";
</script>

</body>
</html>