<?php 

require_once('conn.php');


if(isset($_POST['btnUpdate'])){

$qty = $_POST['pro_qty'];
echo $qty;
$cid = $_POST['cid'];

$sql ="UPDATE `cart` SET `qty` = '$qty' WHERE `cart`.`cid` = '$cid'";
$result = mysqli_query($con,$sql); 
                      
 if($result){
    //  echo "<script>alert('oduct Prhas been Removed...!');</script>";
    //  echo "<script>window.location = 'CartDetails.php';</script>";
    header("location: CartDetails.php");

 }
 else{
     echo"erorr". mysqli_error($con);
 }
}


?>