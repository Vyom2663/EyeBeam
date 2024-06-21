<?php 

require_once('conn.php');
require_once('nav.php');

if(isset($_POST["btnAdd"])){

    $sname = $_POST['sname'];

if(!empty($sname))
{
        $sql = "INSERT INTO shape (sname) value ('$sname')";
     
$result = mysqli_query($con,$sql); 
							
	if(!$result){

		echo('error'.mysqli_connect_error());
	}
    else{
        header("location:displayshape.php");
    }
						
}
else{
    echo "Enter Valid Data." ;
}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shape - EYE-BEAM</title>

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
        <h1>Add Shape : </h1>
    </div>
    <div class="container text-center">
    <form action="addshape.php" method="POST" enctype="multipart/form-data">
    <div>
        <div style="text-align:center;">
            <input type="text" class="in" name="sname" placeholder="Add New Shape Name">
        </div>


        <div class="col-sm-12">
            <button class="btn btn-warning btn-Add mx-3 my-3" name="btnAdd" type="submit">Add Shape</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>
    </div>
</body>

</html>