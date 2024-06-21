<?php 
require_once('conn.php');
session_start();

if(isset($_SESSION['loggedin'])){
    $uid = $_SESSION['uid'];
}

if(isset($_POST["btnOrder"])){
    // if($new_cart){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_SESSION['loggedin'])){
              try{

                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $address = $_POST['address'];
                    $nearby = $_POST['nearby'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $zip = $_POST['pincode'];
                    $email = $_POST['email'];
                    $mobile = $_POST['contact'];
                    $uid = $_SESSION['uid'];
                        
                    // $new_query = "INSERT INTO `ordertbl`(`order_id`, `uname`, `mobile`, `email`, `address`, `zip`, `date`, `uid`) VALUES (' ','$uname','$mobile','$email','$address','$zip',' ','$uid')";
                    $new_query = "INSERT INTO `ordertbl`(`order_id`, `fname`, `lname`, `mobile`, `email`, `address`, `nearby`, `city`, `state`, `zip`, `date`, `uid`) VALUES  (' ','$fname','$lname','$mobile','$email','$address','$nearby','$city','$state','$zip',current_timestamp(),'$uid')";
                    $new_cart = mysqli_query($con, $new_query);
                
                }

                catch (mysqli_sql_exception $e)
                {
                    var_dump($e);
                    exit;
                }
        
                
                $order_id = mysqli_insert_id($con);
	
              		echo "<script>window.location = (\"checkout.php\")</script>";

				}else{
					echo "<script> Something Wrong</script>";
				}
			
			}else{

                echo"<script>alert('First Login Yourself');</script>";
                echo"<script>window.location = 'Login.php'</script>";		
                exit;
			}
	// }

}


                        
                
?>
