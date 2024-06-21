<?php 

session_start();    
require_once('conn.php');

if(isset($_SESSION['loggedin'])){

if(isset($_POST["btnUpdateAddress"])){

  
$address = $_POST['address'];
$nearby = $_POST['nearby'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['pincode'];


$uid= $_SESSION['uid'];

$sql = "UPDATE `user` SET `address` = '$address', `nearby` = '$nearby', `state` = '$state', `city` = '$city', `pin` = '$zip' WHERE `user`.`uid` = $uid";
 echo $sql;           
$result = mysqli_query($con,$sql); 

if($result){
    echo "succesfully updated";

    session_start();

    $_SESSION['uid']= $uid;
    $_SESSION['uname'] =$uname;

    // header("location:editprofile.php");
                         echo"<script>alert('Data Successfully Updated ..')</script>";
                        echo"<script>window.location=(\"editprofile.php\")</script>";
                    
}
else{
    echo "hello";
}                    
}
}
?>