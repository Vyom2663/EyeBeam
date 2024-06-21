<?php  
session_start();    
require_once('conn.php');

if(isset($_SESSION['loggedin'])){

if(isset($_POST['btnUpdateData'])){

$uid = $_SESSION['uid'];
$uname = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
// $address = $_POST['address'];


$sql = " UPDATE `user` SET  `uname` = '$uname', `email` = '$email',`phone`= '$phone' WHERE `user`.`uid`= $uid ";
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
else
{
    
    echo"Error". mysqli_error($con);
}



}
}

?>