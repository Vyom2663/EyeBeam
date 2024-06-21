<?php

session_start();
require_once('conn.php');

$pid =$_POST['pro_id'];
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
                        
                        // Add to cart 
                        
 if(isset($_POST['AddtoCart'])){
      if(isset($_SESSION['loggedin'])){
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_brand = $_POST['pro_brand'];
        $pro_colour = $_POST['pro_colour'];
        
        $pro_qty = $_POST['pro_qty'];
        $pro_image  = $_POST['pro_img1'];
        $pro_size = $_POST['pro_size'];

        $pro_id = $_POST['pro_id'];
        $uid = $_SESSION['uid'];


        if(!isset($pro_size)){
            echo "<script> alert('Please select your size')</script>";
        }
        else if (!isset($pro_colour)){
            echo "<script> alert('Please select your frame colour')</script>";
        }
        else{
            $sql_cart = "select * from cart where pid = $pid and uid = $uid and colour = '$pro_colour' and size = '$pro_size' ";
            $select_cart = mysqli_query($con,$sql_cart);
            
            if(mysqli_num_rows($select_cart) > 0){
                echo "<script>alert('Product already exist')</script>";
                
                echo"<script>window.location = (\"index.php\")</script> ";



            }
            elseif($pro_size == 'Small' and $pro_qty > $qty){
                echo "Product is not available in small size  ..";	
            }
            
            elseif($pro_size == 'Medium' and $pro_qty > $qty){
                echo "Product is not available in medium size  ..";	
            }
            
            elseif($pro_size == 'Large' and $pro_qty > $qty){
                echo "Product is not available in large size  ..";	
            }
            else {

                if(empty($pro_qty)){
                        $pro_qty = 1;
                }
  
                $new_query = "INSERT INTO `cart` (`cid`, `pname`, `price`, `colour`, `qty`, `size`, `image`, `pid`, `uid`, `brand`) VALUES (NULL, '$pro_name', '$pro_price', '$pro_colour', '$pro_qty', '$pro_size', '$pro_image', '$pro_id', '$uid', '$pro_brand')";
               
                $new_cart = mysqli_query($con, $new_query);
                if($new_query){

                    echo "<script>alert('Product added to cart successfully')</script>";
                    echo"<script>window.location = (\"index.php\")</script> ";



                }else{
                    echo "<script>Something Wrong</script>";
                }
            
            }


        }




    }
    else{
        
        echo "<script>alert('Login Yourself');</script>
            <script>window.location = 'Login.php'</script>
        ";
        exit;
      }
  }


?>