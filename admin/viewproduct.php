<?php

session_start();
require_once('conn.php');
require_once('nav.php');

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
    <form action='UpdateProduct.php' method='post'>
									<button type='submit' name='btnup' class='btn btn-warning btnup mb-2 px-3'>Update</button>
										<input type='text' hidden value = "<?php echo $pid;?>" name = 'upid'>
									</form>
									<form action='DeleteProduct.php' method='post'>
									
										<button type='submit' name='btndel' class='btn btn-danger btndel px-3'>Delete</button>
										<input type='text' hidden value = "<?php echo $pid;?> " name = 'delid'>
                                        
										
									</form>
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
</div>
</div>

<?php include("../user/footer.php")?>
</body>
</html>