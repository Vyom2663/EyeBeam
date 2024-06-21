<?php 


if(isset($_POST['btndel'])){
    require_once('conn.php');
    $delid = $_POST['delid'];
    // echo $delid;

    $sql = "DELETE FROM review WHERE `review`.`rid` = $delid";

    $result = mysqli_query($con,$sql); 



if($result){

    echo"<script>alert('Review Disabled Successfully ..');</script>";
    echo"<script>window.location = 'review.php'</script>";	
    
            }
else{
        echo"erorr". mysqli_error($con);
    }
 }


 // brand //
 if(isset($_POST['btndelbrand'])){
    require_once('conn.php');
    $delid = $_POST['delid'];
    // echo $delid;

    $sql = "DELETE FROM brand WHERE `brand`.`bid` = $delid";

    $result = mysqli_query($con,$sql); 



if($result){

    echo"<script>alert('Brand deleted Successfully ..');</script>";
    echo"<script>window.location = 'displaybrand.php'</script>";	
    
            }
else{
        echo"erorr". mysqli_error($con);
    }
 }


 // brand //
 if(isset($_POST['btndelshape'])){
    require_once('conn.php');
    $delid = $_POST['delid'];
    // echo $delid;

    $sql = "DELETE FROM shape WHERE `shape`.`sid` = $delid";

    $result = mysqli_query($con,$sql); 



if($result){

    echo"<script>alert('Shape deleted Successfully ..');</script>";
    echo"<script>window.location = 'displayshape.php'</script>";	
    
            }
else{
        echo"erorr". mysqli_error($con);
    }
 }

?>
