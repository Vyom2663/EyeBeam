<?php 
require_once('conn.php');
session_start();

if(isset($_SESSION['loggedin'])){
    $uid = $_SESSION['uid'];
}


if(isset($_POST['cod'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_SESSION['loggedin'])){
              try{      

                        $uid = $_SESSION['uid'];
                        $status = "Cash on Delivery";
                        
                        $new_query = "select * from ordertbl ORDER BY order_id DESC LIMIT 1";
                        $new_cart = mysqli_query($con, $new_query);
                        $rows=mysqli_fetch_assoc($new_cart);
                       
                        $oid = $rows['order_id'];
                        // echo"<script>alert('$oid')</script>";
                        
                    
                            $paymenttyp = "Cash on Delivery";
                    

                            $id ="COD";
                    
                            $new_query = "INSERT INTO `payment_status`(`payid`, `orderid`, `type`,`acc`, `status`, `time`) VALUES ('','$oid','$paymenttyp','$id','$status',CURRENT_TIMESTAMP())";
                
                    $new_cart = mysqli_query($con, $new_query);
                    
                }

                catch (mysqli_sql_exception $e)
                {
                    var_dump($e);
                    exit;
                }
        
                
                $order_id = mysqli_insert_id($con);
	
                $newsql="select * from cart where uid=$uid";
                $newquery=mysqli_query($con, $newsql);
                while($rows=mysqli_fetch_assoc($newquery)){
                    $pid = $rows['pid'];
                    $uid = $rows['uid'];
                    $pname = $rows['pname'];
                    $price = $rows['price'];
                    $size = $rows['size'];
                    $colour = $rows['colour'];
                    $prod_qty = $rows['qty'];
                    $image = $rows['image'];
                    // $ordered =$rows['ordered'];
                    // $total_amount = $rows['total_amount'];
                    
                    $insert_items = "INSERT INTO `ordered_item` (`oid`, `pid`, `uid`, `aid`, `pname`, `price`, `size`, `colour`, `qty`, `image`, `odered`) 
                    VALUES (NULL, '$pid', '$uid','$oid', '$pname', '$price', '$size', '$colour', '$prod_qty', '$image', current_timestamp())";
					$insert_items_query = mysqli_query($con, $insert_items);
	
					$sql="select * from product where pid= '$pid'";
					$query=mysqli_query($con,$sql);
                    
                    while($rows=mysqli_fetch_assoc($query)){
	
						$qty = $rows['quantity'];
					
					if($size == 'Small'){
						$newqty = $qty - $prod_qty;
						$updatesql = "update product set quantity='$newqty' where pid='$pid'";
						mysqli_query($con, $updatesql);
					}
                    elseif($size == 'Medium'){
						$newqty = $qty - $prod_qty;
						$bupdatesql = "update product set quantity='$newqty' where pid='$pid'";
						mysqli_query($con, $bupdatesql);
					}
                    elseif($size == 'Large'){
						$newqty = $qty - $prod_qty;
						$cupdatesql = "update product set quantity='$newqty' where pid='$pid'";
						mysqli_query($con, $cupdatesql);
                    }
					
                    $deletequery = "delete from cart where pid='$pid' and uid ='$uid'";
					mysqli_query($con, $deletequery);
					}
	
				}
	
					 echo "<script>alert('Order Placed Successfully')</script>";
					// header('location:index.php');
                    $_SESSION['invoice_id'] = $oid;
					echo "<script>window.location = ('invoice.php')</script>";
					// echo "<script>window.location = (\"index.php\")</script>";

				}else{
                    echo"<script>alert('First Login Yourself');</script>";
                    echo"<script>window.location = 'Login.php'</script>";		
             
				}
			
			}else{

                echo "<script> Something Wrong</script>";
                exit;
		}
    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Checkout</title>
    <style>
        .container{
            border:1px solid lightgrey;
            border-radius:5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            height: 550px;
            margin: 50px 0;
            width:100%;
            display:flex;
        }
        .container img{
            width : 100%
        }
        .odetails{
            width: 100%;
            margin : 0 20px;
        }
        .image1 img{
            width : 100px;
        }
        .btn-warning .p1 , .p1 i{
            color : blue;
        }
        .btn-warning .p2{
            color : rgb(3, 189, 235);
        }
        h4{
            padding: 5px 0 0 0;
        }
        th, td {
            padding: 10px 40px;
            text-align : center;
        }
        .bt{
            padding : 0 0 0 90px;
        }
    </style>
</head>
<body>
<?php include("_navbar.php")?>
<div class="container">
        <img src="../img/1.jpg">
        <div class="odetails">
        
        
        
        
        <h4>Order Details :</h4>
            <hr>
            <table class="image1">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php
                require_once('conn.php');
                $uid = $_SESSION['uid'];
                $total=0;
                $newsql="select * from cart where uid=$uid";
                $newquery=mysqli_query($con, $newsql);
                while($rows=mysqli_fetch_assoc($newquery)){
                    $pid = $rows['pid'];
                    $uid = $rows['uid'];
                    $pname = $rows['pname'];
                    $price = $rows['price'];
                    $size = $rows['size'];
                    $colour = $rows['colour'];
                    $prod_qty = $rows['qty'];
                    $image = $rows['image'];
                    // $ordered =$rows['ordered'];
                    $amount = $price * $prod_qty;
                    $total = $total + $amount;
                  echo" <tr>
                    <td>$pname</td>
                    <td>$prod_qty</td>
                    <td>₹$price</td>
                </tr>";}
                echo"
            </table>
            <hr>
            <div style='display:flex;'>
                <h5 style='margin :  0 0 0 15px;'>Total Price:</h5>
                <b style='margin :  0 0 0 300px;'> ₹$total</b>
            </div>";
                ?>
            <hr>
            <div class="bt">
                <form action="checkout.php" method="POST" >
                <button type="submit" class="btn btn-success" name="cod"> Confirm and place order | COD </button>
                </form>
    
               <form action="paymentupi.php" method="POST" >
                <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalpaypal"><span class="p1"><i class="fa-brands fa-paypal" name = "upi">  </i><b>Pay</b></span><span class="p2"><b>Pal</b></span></button>
                </form>
    
                <form action="paymentcard.php" method="POST" >
                <button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalcd"><i class="fa-solid fa-credit-card" name="credit"></i>Debit or Credit Card </button>
                <input type="hidden" value='<?php echo"$total"?>'>
                </form>

            </div>
        </div>
</div>
<?php include("footer.php")?>
</body>
</html>