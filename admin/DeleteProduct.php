<?php 
if(isset($_POST['btndel'])){
    require_once('conn.php');
    $delid = $_POST['delid'];
    // echo $delid;

    $sql = "DELETE FROM product WHERE `product`.`pid` = $delid";

    $result = mysqli_query($con,$sql); 



if($result){
    echo "succesfully Deleted...";
    header("location:DisplayProduct.php");
    
            }
else{
        echo"erorr". mysqli_error($con);
    }
 }

?>
