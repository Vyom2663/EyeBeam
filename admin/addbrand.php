<?php 

require_once('conn.php');
require_once('nav.php');

if(isset($_POST["btnAdd"])){

 $bname = $_POST['bname'];

if(!empty($bname))
{
        $sql = "INSERT INTO brand (bname) values ('$bname')";
     
       
$result = mysqli_query($con,$sql); 
							
	if(!$result){

		echo('error'.mysqli_connect_error());
	}
    else{
    header("location:displaybrand.php");
    }
}
else{
    echo "Please Insert Valid data";
}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand - EYE-BEAM</title>

    <!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </Script>
    <style>
        h1{
            margin : 25px 0;
        }
        .in{
            padding:6px 75px 6px 15px;
            border:1px solid lightgrey;
            border-radius:5px;
        }
    </style>

</head>

<body>
    <div class="heading text-center mt-5">
        <h1>Add Brand : </h1>
    </div>
    <div class="container text-center">
    <form action="addbrand.php" method="POST" >
    <div>
        <div style="text-align:center;">
            <input type="text" class="in" name = "bname" placeholder="Add New Brand Name">
        </div>


        <div class="col-sm-12">
            <button class="btn btn-warning btn-Add mx-3 my-3" name="btnAdd" type="submit">Add Brand</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>
    </div>
</body>

</html>