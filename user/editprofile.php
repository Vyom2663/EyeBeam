<?php 

require_once('conn.php');
session_start();
if(isset($_SESSION['loggedin'])){
$uid= $_SESSION['uid'];
$sql = "select * from user where uid = $uid";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$address = $row['address'];
            $nearby = $row['nearby'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['pin'];
}
else{
echo'<script>alert("Please LOgin Yourself First ");<script>';
exit();
}

if(isset($_POST["btnPicUpdate"])){
    
    $image = $_FILES['img'];
    $filename = $image['name'];
    $fileerror = $image['error'];
    $filetmppath = $image['tmp_name'];

    $fileexplode = explode(".",$filename);
    $filecheck = strtolower(end($fileexplode));

    $filevallidext= array('png' , 'jpeg' , 'jpg');

    if(in_array($filecheck,$filevallidext)){
        $filepath1 = "../admin/upload/".$filename;
        move_uploaded_file($filetmppath,$filepath1);

    }
    else{
        $img_err =" Image  Upload Error ..";
    }
            
        if(empty($img1err))
        {
                $uid= $_SESSION['uid'];

                $sql = "UPDATE `user` SET `image` = '$filepath1' WHERE `user`.`uid` = $uid;";
                            
                $result = mysqli_query($con,$sql); 
                                    
                if(!$result){

                    echo('error'.mysqli_connect_error());
                }
                                
        }
        else{
            echo "image Querry Error" ;
        }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        .contain{
            margin: 95px 445px;
            padding : 20px 30px 25px 30px;
            border : 1px solid lightgrey;
            border-radius:10px;
        }
        .container img{
            width:25%;
            border-radius:50%; 
            margin : 15px 0 0 110px;
        }
        .container a{
            text-decoration:none; 
            color:black;
            margin-left : 99px;
        }
        h1{
            margin-left:45px;
        }
        .container a:hover{
            text-decoration:underline;
            color:blue;
        }
        .divlable{
            margin:4px 0;
        }
        .divbutton input{
            width:70%;
            padding : 6px 25px 6px 25px ;
        }
        .modal-body input{
            padding-left:10px;
            width:50%;
            margin-left :85px;
        }
    </style>
</head>
<body>
<?php include("_navbar.php") ?>
<div class="contain">
<div class="container">
    <h1>User Profile</h1>
    <img src="<?php echo $row['image']?>">
    <br>
    <a href="#" data-bs-toggle="modal" data-bs-target="#profiteimg">Change Image</a>

    <form action="UpdateProfile.php" method="POST">
    <div class="divlable" style="margin-top:20px">
        <label for="" style="margin-right:25px;" >User Name :</label>
        <input type = "text"  name ="username" value="<?php echo $row['uname']?>" required>
        </div>
        <div class="divlable">
        <label for="" style="margin-right:65px;">Email :</label>
        <input type = "email"  name ="email" value="<?php echo $row['email']?>" required>
        <!-- <label for="">abc123@gmail.com</label> -->
        <!-- <input type="text"> -->
        </div>
        <div class="divlable">
        <label for="" style="margin-right:32px;">Phone No :</label>
        <input type = "text"  name ="phone" value="<?php echo $row['phone']?>" pattern="[7-9]{1}[0-9]{9}" title="Please Enter Valid Mobile Number">
        <!-- <label for="">+91 9900990099</label> -->
        <!-- <input type="text"> -->
        </div>
        <div class="divlable">
        <label for="" style="margin-right:45px;">Address :</label>
        <label for="" data-bs-toggle="modal" data-bs-target="#Editaddress"><?php echo $address;  echo","; echo $nearby; echo","; echo"$city"; echo","; echo"$state"; echo"-"; echo"$zip";?></label>
        <!-- <textarea name="" id="" cols="23" rows="10"></textarea> -->
        </div>
        <div class="d-flex">
        <a href="index.php" style="margin-left : 5px;">
        <div class="divbutton">
            <input type="button" class="btn btn-outline-secondary" style="margin :20px 75px 0 0; " value="Cancel">
        </div>
      </a>
        <div class="divbutton">
            <input type="Submit" class="btn btn-outline-primary" style="margin :20px 75px 0 0; " value="Update" name ="btnUpdateData">
        </div>
        </div>
    </form>
</div>
</div>



<!-- modals -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="profiteimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="file" class="form-control" name="img" accept="image/jpeg, image/png, image/jpg" required></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary" name="btnPicUpdate">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="UpdateAddress.php" method="POST">
<div class="modal fade" id="Editaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="display:flex;">
            <input type="text" placeholder="House no. and Society name" style="margin :10px 5px; padding:5px;" name="address" value="<?php echo $row['address']?>">          
            <input name="nearby" type="text" placeholder="Near by area" style="margin :10px 5px; padding:5px; "  value="<?php echo $row['nearby']?>">
        </div>
            <select name="state" id="Select1" required="" class="state" style="padding:5px 310px 5px 5px; margin : 0 5px;" autocomplete="shipping address-level1">
                <option disabled="" value="" hidden="" >&nbsp;</option>
                <option value="SS">Select the State</option>
                <option disabled="" value="">---</option>
                <option hidden selected="selected" value="<?php echo $row['state']?>"><?php echo $row['state']?></option>
                <option value="Gujarat">Gujarat</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Rajashthan">Rajasthan</option>
                <option value="Delhi">Delhi</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
            </select>
        <div style="display:flex;">
            <input style="padding:5px 125px 5px 5px; margin : 10px 5px;" type="text" placeholder="City" name="city" value="<?php echo $row['city']?>">
            <input name ="pincode" style="margin : 10px 5px; padding:5px 125px 5px 5px;" type="text" placeholder="PIN Code" value="<?php echo $row['pin']?>">
        </div> 
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary" name="btnUpdateAddress">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>

</body>

</html>