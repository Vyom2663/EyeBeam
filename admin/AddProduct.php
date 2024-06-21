<?php 

require_once('conn.php');
require_once('nav.php');

if(isset($_POST["btnAdd"])){

    $pname = $price = $brand = $qty = $for = $cat = $des = $size = $img1 = $img11 = $img3 = $img2 = $img22 = $img222 = $img3 = $img33 = $img333 = " ";
    $pnameerr = $priceerr = $branderr = $qtyerr = $forerr = $caterr = $deserr = $sizeerr = $img1err = $img11err = $img3err = $img2err = $img22err = $img222err = $img3err = $img33err = $img333err = " ";

    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $qty = $_POST['quantity'];
    $for = $_POST['for'];
    // $cat = $_POST['catagory'];
    $des = $_POST['discription'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    $shape = $_POST['shape'];
    $colour = $_POST['colour'];
    $material = $_POST['material'];
    
   

    $img1 = $_FILES['img1'];
    $img2  = $_FILES['img2'];
    $img3  = $_FILES['img3'];
    
    $img4 = $_FILES['img4'];
    $img5  = $_FILES['img5'];
    $img6  = $_FILES['img6'];
   


// img-1 url for image :- 

    $filename = $img1['name'];
    $fileerror = $img1['error'];
    $filetmppath = $img1['tmp_name'];

    $fileexplode = explode(".",$filename);
    $filecheck = strtolower(end($fileexplode));

    $filevallidext= array('png' , 'jpeg' , 'jpg');

    if(in_array($filecheck,$filevallidext)){
        $filepath1 = "upload/".$filename;
        move_uploaded_file($filetmppath,$filepath1);

    }
    else{
        $img1err =" Image 1 Upload Error ..";
    }

//img 2 Url :-
    
    $filename2 = $img2['name'];
    $fileerror = $img2['error'];
    $filetmppath = $img2['tmp_name'];

    $fileexplode = explode(".",$filename);
    $filecheck = strtolower(end($fileexplode));

    $filevallidext2 = array('png' , 'jpeg' , 'jpg');

    if(in_array($filecheck ,$filevallidext )){
        $filepath2 = "upload/".$filename2;
        move_uploaded_file($filetmppath,$filepath2);

    }
    else{
        $img1err =" Image 2 Upload Error ..";
    }

    
// img-3 url for image :- 

$filename = $img3['name'];
$fileerror = $img3['error'];
$filetmppath = $img3['tmp_name'];

$fileexplode = explode(".",$filename);
$filecheck = strtolower(end($fileexplode));

$filevallidext= array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck,$filevallidext)){
    $filepath3 = "upload/".$filename;
    move_uploaded_file($filetmppath,$filepath3);

}
else{
    $img1err =" Image 3 Upload Error ..";
}


// img-4 url for image :- 

$filename = $img4['name'];
$fileerror = $img4['error'];
$filetmppath = $img4['tmp_name'];

$fileexplode = explode(".",$filename);
$filecheck = strtolower(end($fileexplode));

$filevallidext= array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck,$filevallidext)){
    $filepath4 = "upload/".$filename;
    move_uploaded_file($filetmppath,$filepath4);

}
else{
    $img1err =" Image 4 Upload Error ..";
}



// img-5 url for image :- 

$filename = $img5['name'];
$fileerror = $img5['error'];
$filetmppath = $img5['tmp_name'];

$fileexplode = explode(".",$filename);
$filecheck = strtolower(end($fileexplode));

$filevallidext= array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck,$filevallidext)){
    $filepath5 = "upload/".$filename;
    move_uploaded_file($filetmppath,$filepath5);

}
else{
    $img1err =" Image 5 Upload Error ..";
}

// img-6 url for image :- 

$filename = $img6['name'];
$fileerror = $img6['error'];
$filetmppath = $img6['tmp_name'];

$fileexplode = explode(".",$filename);
$filecheck = strtolower(end($fileexplode));

$filevallidext= array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck,$filevallidext)){
    $filepath6 = "upload/".$filename;
    move_uploaded_file($filetmppath,$filepath6);

}
else{
    $img1err =" Image 6 Upload Error ..";
}



if(!empty($img1err))
{
        $sql = "INSERT INTO `product` VALUES (' ','$pname','$brand','$price','$qty','$for','$size', '$type','$colour','$shape','$material','$des','$filepath1','$filepath2','$filepath3','$filepath4','$filepath5','$filepath6')";
     
        
// $sql = "INSERT INTO `product`(`pname`, `brand`, `price`, `quantity`, `for`, `catagory`, `size`, `type`, `colour`, `shape`, `material`,`description`, `img11`, `img12`, `img13`, `img14`, `img15`, `img16`) VALUES ('$pname','$brand','$price','$qty','$for','$cat','$size','$des','$filepath1','$filepath2')";
// echo $sql;
$result = mysqli_query($con,$sql); 
							
	if(!$result){

		echo('error'.mysqli_connect_error());
	}
    header("location:DisplayProduct.php");
						
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
    <title>Add Product - EYE-BEAM</title>

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
        .col-sm-3{
            margin:5px;
        }
        .col-sm-3 input{
            margin:15px;
        }
        .col-sm-3 .dropdown{
            padding : 10px;
        }
        .col-sm-3 .dropdown select{
            padding : 5px 50px 5px 10px;
        }
        .col-sm-4{
            margin : 10px 0 0 25px; 
        }
    </style>

</head>

<body>
    <div class="heading text-center">
        <h1>Add Product : </h1>
    </div>
    <div class="container text-center">
    <form action="AddProduct.php" method="POST" enctype="multipart/form-data">

<div>

    <div style="display:flex;">
        <div class="col-sm-3">
            <input type="text" class="form-control " name="pname" placeholder="Name" required></input>
        </div>

        <div class="col-sm-3">
            <input type="numbers" class="form-control " name="price" placeholder="Price" required></input>
        </div>

        <div class="col-sm-3">
        <div class="dropdown">
            <label for='shape'>Shape :</label>
            <select id='shapelbl' name='shape' required>
            <?php 
                require_once('conn.php');
                  $sql = "select * from shape";

                $result = mysqli_query($con,$sql);
                
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        $sid = $row['sid'];
                        $sname = $row['sname'];
                       
                        echo"<option class='dropdown-item' value='$sname'>$sname</option>";
                        
                    }   
                }
                
                ?>
                </select>
            </div>
            <!-- <input type="text" class="form-control " name="shape" placeholder="Shape" required></input> -->
        </div>


        <div class="col-sm-3">
            <!-- <input type="text" class="form-control" name="brand" placeholder="Brand " required></input> -->
            <div class="dropdown">
            <label for='brand'>Brand :</label>
            <select id='shapelbl' name='brand' required>
            <?php 
                require_once('conn.php');
                  $sql = "select * from brand";

                $result = mysqli_query($con,$sql);
                
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        $bid = $row['bid'];
                        $bname = $row['bname'];
                       
                        echo"<option class='dropdown-item' value='$bname'>$bname</option>";
                        
                    }   
                }
                
                ?>
                </select>
            </div>
        
        
        </div>
    </div>
    <div style="display:flex; margin : 0;">
        <div class="col-sm-3">
        
            <input type="numbers" class="form-control" name="quantity" placeholder="Quantity" required></input>
        </div>

        <div class="col-sm-4" >
        <button class="btn"  name = "Forlabel">For :</button>

            <!-- <input type="text" class="form-control" name="for" placeholder="For" required></input> -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="for" id="Man" value="Man" required >
                <label class="form-check-label" for="man" name = "man"> Man </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="for" id="woman" value="Woman">
                <label class="form-check-label" for="woman" name="woman">Woman</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="for" id="kid" value="Kid">
                <label class="form-check-label" for="kid" name="kid">Kid</label>
                </div>
        </div>

        <div class="col-sm-4">
        <button class="btn" name = "Sizelabel">Size :</button>

            <!-- <input type="text" class="form-control" name="size" placeholder="Size" required></input> -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="size" id="Small" value="Small" required>
                <label class="form-check-label" for="small" name = "Small "> Small </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="size" id="Medium" value="Medium">
                <label class="form-check-label" for="medium" name="Medium">Medium</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="size" id="Large" value="Large">
                <label class="form-check-label" for="large" name="Large">Large</label>
                </div>
        </div>

    </div>

    <div style="display :flex;">

        <div class="col-sm-3">
            <input type="text" class="form-control" name="colour" placeholder="colour" required></input>
        </div>

        
        <div class="col-sm-3">
            <input type="text" class="form-control" name="material" placeholder="Material Detail" required></input>
        </div>

        
        <div class="col-sm-3">
            <input type="text" class="form-control" name="discription" placeholder="Discription" required></input>
        </div>
        <div class="col-sm-3">
             <div class="dropdown">
                <label for="Type">Type :</label>
                <select id="Type" name="type">
                <option class="dropdown-item" value="Eyeglass">Eyeglass</option>
                <option class="dropdown-item" value="Sunglass">Sunglass</option>
                </select>
            </div>
        </div>
    </div>

    <div style="display :flex;">
        <div class="col-sm-4">
            <input type="file" class="form-control" name="img1" required></input>
        </div>

        <div class="col-sm-4">
            <input type="file" class="form-control" name="img2" required></input>
        </div>

        <div class="col-sm-4">
            <input type="file" class="form-control" name="img3" required></input>
        </div>

    </div>

    
    <div style="display :flex;">
        <div class="col-sm-4">
            <input type="file" class="form-control" name="img4" required></input>
        </div>

        <div class="col-sm-4">
            <input type="file" class="form-control" name="img5" required></input>
        </div>

        <div class="col-sm-4">
            <input type="file" class="form-control" name="img6" required></input>
        </div>

    </div>
        <div class="col-sm-12">
            <button class="btn btn-warning btn-Add mx-3 my-3" name="btnAdd" type="submit">Add Product</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>
    </div>
</body>

</html>