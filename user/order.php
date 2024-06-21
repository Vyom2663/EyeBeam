<?php 
session_start();

if(isset($_SESSION['loggedin'])){

    $uid= $_SESSION['uid'];
    $uname= $_SESSION['uname'];

    require_once('conn.php');
         
          $sql = "select * from user where uid = '$uid'";

						$result = mysqli_query($con,$sql);

						if($result){
							while($row=mysqli_fetch_array($result)){
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $add = $row['address'];
                                $nearby = $row['nearby'];
                                $city = $row['city'];
                                $state = $row['state'];
                                $pincode = $row['pin'];
                               
                            }
                        }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .logo{
            text-align:center;
            background-color : lightgrey;
            padding: 15px 0;
        }
        .logo img{
            width : 10%;
        }
        form{
            margin:30px 105px;
        }
        h5{
            margin:12px 0;
        }
        input{
            padding:5px 870px 5px 5px;
            border: 1px solid lightgrey;
            border-radius:4px;
        }
        .country{
            padding:6px 765px 6px 5px;
            background-color:white;
            border: 1px solid lightgrey;
            border-radius:4px;
            margin : 15px 0;
        }
        .state{
            padding:6px 132px 6px 5px;
            background-color:white;
            border: 1px solid lightgrey;
            border-radius:4px;
            margin : 0 0 0 15px; 
        }
        button{
            
            background-color : #18af9f;
            color :white;
            padding:6px 25px 6px 25px;
            border : 1px solid white;
            border-radius:4px;
            margin:0 0 0 770px; 
        }
        .line{
            border: 0.5px solid lightgrey;
            width: 1082px;
            margin: auto;
        }
        .l{
            margin:20px 90px;
            display:flex;
        }
        .l a{
            text-decoration : none;
            color :#18af9f;
            margin : 0 15px ;
        }
    </style>
    <title>Shipping Details</title>
</head>
<body>
    <div class="logo">
        <a href="index.php"><img src="../img/logo2.png" alt="logo"></a>
    </div>
    <form action="OrderPage.php" method="POST">
        <h5 style="margin: 20px 0 0 0;">Shipping address: </h5>

        <div style="display:flex;">
            <input style="padding:5px 324px 5px 5px;" type="text" placeholder="First Name" name="fname" value = "<?php echo $uname?>" required>
            <input style="margin :0 0 0 15px; padding:5px 324px 5px 5px;" type="text" placeholder="Last Name" name="lname" required>
        </div>  
        <input type="text" placeholder="Address(House no. and Society name)" style="margin :15px 0;"name="address" value = "<?php echo $add?>" required>          
        <input name="nearby" type="text" placeholder="Near by area" style="margin : 0 0 15px 0;" value = "<?php echo $nearby?>" required>
       
        <div style="display:flex;">
            <select name="state" id="Select1" required="" class="state" style="padding:5px 226px 5px 5px; margin-left:0px;" autocomplete="shipping address-level1" required>
                <option disabled="" value="" hidden="" >&nbsp;</option>
                <option value="SS">Select the State</option>
                <option disabled="" value="">---</option>
                <option hidden selected="selected" value="<?php echo $state?>"><?php echo $state?></option>
                <option value="Mumbai">Mumbai</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Rajashthan">Rajashthan</option>
                <option value="Delhi">Delhi</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
            </select>
            <input style="padding:5px 132px 5px 5px; margin-left:15px" type="text" placeholder="City" name="city" value="<?php echo $city?>" required>
            <input name ="pincode" style="margin :0 0 0 15px; padding:5px 132px 5px 5px;" type="text" placeholder="PIN Code" value="<?php echo $pincode?>" pattern="[0-9]{6}" title="Please Enter Valid PIN Code">
        </div> 
        <div style="display:flex; margin:15px 0 10px 0;">
            <input style="padding:5px 324px 5px 5px;" type="email" placeholder="Email" name="email" value="<?php echo $email?>" required>
            <input style="margin :0 10px 0 15px; padding:5px 324px 5px 5px;" type="text" placeholder="Contact Number" value="<?php echo $phone?>" name="contact" pattern="[7-9]{1}[0-9]{9}" title="Please Enter Valid Mobile Number">
        </div>  
        <!-- <input type="text" placeholder="Phone Number" style="margin :15px 0 5px 0 ;" name="contact"> -->
        <input style="margin : 0 10px 0 0;" type="checkbox" id="" name="" value=""><label>Save this information for next time</label>
        <div style="margin:20px 0; display:flex;">
            <a href="cartdetails.php" style="color:#18af9f; padding :5px 0 0 0; text-decoration : none;"><i style="margin:0 5px 0 0;" class="fa-solid fa-chevron-left"></i>Return to cart</a>
            <button type="submit" name="btnOrder">Continue to shipping</button>
        </div>
    </form>
    <div class="line"></div>
    <div class="l">
    <a href="ss.php">Shipping policy</a>
    <a href="pp.php">Privacy policy</a>
    <a href="ts.php">Terms of service</a>
    </div>
</body>
</html>