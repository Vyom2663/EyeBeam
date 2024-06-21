<?php 

require_once('conn.php');
require_once('nav.php');

if(isset($_POST['btnup'])){    
$upid = $_POST['upid'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product - EYE-BEAM</title>

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
        .col-sm-2 .dropdown{
            padding : 10px;
        }
        .col-sm-2 .dropdown select{
            padding : 5px 10px 5px 10px;
        }
        .col-sm-2{
            margin : 10px 0 0 25px; 
        }
        .col-sm-4{
            margin : 10px 0 0 25px; 
        }
    </style>

</head>

<body>
<div class="heading text-center">
        <h1>Update Product : </h1>
    </div>
    <div class="container text-center">
        <form action="UpdatePro.php" enctype="multipart/form-data" method="post">
        <input type="number" hidden value="<?php echo $upid;?>" name="upid2">
            <div class="container">

            <?php 
 
					require_once('conn.php');
				
						$sql = "select * from product where pid = $upid";
						$result = mysqli_query($con,$sql);
					    $row=mysqli_fetch_array($result);
				?>
                <div style="display:flex;">
                    <div class="col-sm-3">
                        <input type="text" class="form-control " name="pname" placeholder="Name" value="<?php echo $row['pname']?>" required></input>
                    </div>

                    <div class="col-sm-3">
                        <input type="numbers" class="form-control " name="price" placeholder="Price" value="<?php echo $row['price']?>" required></input>
                    </div>
                    <div class="col-sm-3">
                        <input type="numbers" class="form-control" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity']?>" required></input>
                    </div>
                    <div class="col-sm-3">
                    <div class="dropdown">
                            <label for="shape">Shape :</label>

                            <select id="shapelbl" name="shape" required>
                            <option class="dropdown-item" value="<?php echo $row['shape']?>" selected hidden><?php echo $row['shape']?></option>
                            <?php 
                                $sql1 = "select * from shape";

                                $result1 = mysqli_query($con,$sql1);
                                
                                if($result1){
                                    while($rowss=mysqli_fetch_array($result1)){
                                        $sid = $rowss['sid'];
                                        $sname = $rowss['sname'];
                                    
                                        echo"<option class='dropdown-item' value='$sname'>$sname</option>";
                                        
                                    }   
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    
                </div>

                    <div style="display:flex;">
                    
                    <div class="col-sm-2">
                        <div class="dropdown">
                            <label for="shape">Brand</label>

                            <select id="brand" name="brand" required>
                            <option class="dropdown-item" value="<?php echo $row['brand']?>" selected  hidden><?php echo $row['brand']?></option>
                            <?php 
                                $sql1 = "select * from brand";

                                $result1 = mysqli_query($con,$sql1);
                                
                                if($result1){
                                    while($rowss=mysqli_fetch_array($result1)){
                                        $bid = $rowss['bid'];
                                        $bname = $rowss['bname'];
                                    
                                        echo"<option class='dropdown-item' value='$bname'>$bname</option>";
                                        
                                    }   
                                }
                                
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="dropdown">
                            <label for="Type">Type :</label>

                            <select id="Type" name="type">
                            <option class="dropdown-item" value="<?php echo $row['type']?>" selected  hidden><?php echo $row['type']?></option>
                            <option class="dropdown-item" value="Eyeglass" >Eyeglass</option>
                            <option class="dropdown-item" value="Sunglass">Sunglass</option>  
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Size :</label>
                    <?php $size = $row['size'];

                            if($size=='Small'){
                            echo"<div class='form-check  form-check-inline'>
                                <input class='form-check-input' type='radio' name='size' id='small' value='$size' checked='checked'>
                                <label class='form-check-label' for='small' name = '$size'>$size </label>
                            </div>";    
                            }
                            else{
                                echo"
                            <div class='form-check  form-check-inline'>
                                <input class='form-check-input' type='radio' name='size' id='Small' value='Small' required>
                                <label class='form-check-label' for='small' name = 'small '> Small </label>
                            </div>";
                            }
                        
                            if($size=='Medium'){
                                echo"<div class='form-check  form-check-inline'>
                                    <input class='form-check-input' type='radio' name='size' id='Medium' value='$size' checked='checked'>
                                    <label class='form-check-label' for='Medium' name = '$size'> $size </label>
                                </div>";
                                }
                                else{
                                    echo"
                                <div class='form-check  form-check-inline'>
                                    <input class='form-check-input' type='radio' name='size' id='Medium' value='Medium' required>
                                    <label class='form-check-label' for='Medium' name = 'Medium '> Medium </label>
                                </div>";
                                }


                                if($size=="Large"){
                                    echo"<div class='form-check  form-check-inline'>
                                        <input class='form-check-input' type='radio' name='size' id='Large' value='$size' checked='checked'>
                                        <label class='form-check-label' for='Large' name = '$size'>$size </label>
                                    </div>";
                                    }
                                    else{
                                        echo"
                                    <div class='form-check  form-check-inline'>
                                        <input class='form-check-input' type='radio' name='size' id='Large' value='Large' required>
                                        <label class='form-check-label' for='Large' name = 'Large '> Large </label>
                                    </div>";
                                    }    
                        ?>
                    </div>


                    <div class="col-sm-4">
                    <label for="">For :</label>
                    <?php $for = $row['for'];

                            if($for=='Man'){
                            echo"<div class='form-check  form-check-inline'>
                                <input class='form-check-input' type='radio' name='for' id='Man' value='$for' checked='checked'>
                                <label class='form-check-label' for='Man' name = '$for'>$for </label>
                            </div>";    
                            }
                            else{
                                echo"
                            <div class='form-check  form-check-inline'>
                                <input class='form-check-input' type='radio' name='for' id='Man' value='Man' required>
                                <label class='form-check-label' for='Man' name = 'Man '> Man </label>
                            </div>";
                            }
                        
                            if($for=='Woman'){
                                echo"<div class='form-check  form-check-inline'>
                                    <input class='form-check-input' type='radio' name='for' id='Woman' value='$for' checked='checked'>
                                    <label class='form-check-label' for='Woman' name = '$for'> $for </label>
                                </div>";
                                }
                                else{
                                    echo"
                                <div class='form-check  form-check-inline'>
                                    <input class='form-check-input' type='radio' name='for' id='Woman' value='Woman' required>
                                    <label class='form-check-label' for='Woman' name = 'Woman '> Woman </label>
                                </div>";
                                }


                                if($for=="Kid"){
                                    echo"<div class='form-check  form-check-inline'>
                                        <input class='form-check-input' type='radio' name='for' id='Kid' value='$for' checked='checked'>
                                        <label class='form-check-label' for='Kid' name = '$for'>$for </label>
                                    </div>";
                                    }
                                    else{
                                        echo"
                                    <div class='form-check  form-check-inline'>
                                        <input class='form-check-input' type='radio' name='for' id='Kid' value='Kid' required>
                                        <label class='form-check-label' for='Kid' name = 'Kid'> Kid </label>
                                    </div>";
                                    }    
                        ?>
                    </div>
                </div>
                <div style="display:flex;">
                <div class="col-sm-4">
                        <input type="text" class="form-control" name="colour" placeholder="Colour" value="<?php echo $row['colour']?>" required></input>
                    </div>                    
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="material" placeholder="Material" value="<?php echo $row['material']?>" required></input>
                    </div>
                
                    <div class="col-sm-4 mx-3">
                        <textarea type="text" class="form-control" name="discription" placeholder="Discription"  value="<?php echo $row['description']?>" required><?php echo $row['description']?></textarea>
                    </div>
                </div> 
                    <div style="display:flex;">

                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img1" placeholder="image 1 - "  ></input>
                        <input type="hidden" name="a" value="<?php echo $row['img11']?>" >   </input>
                    </div>

                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img11" placeholder=" image 1 -"   ></input>
                        <input type="hidden" name="b" value="<?php echo $row['img12']?>" >   </input>
                    
                    </div>

                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img111" placeholder=" image 1 -"   ></input>
                        <input type="hidden" name="c" value="<?php echo $row['img13']?>" >   </input>
                    
                    </div>

                </div>

                <div style="display:flex;">
                
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img2" placeholder="image 1 - "   ></input>
                        <input type="hidden" name="d" value="<?php echo $row['img14']?>" >   </input>

                    </div>

                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img22" placeholder=" image 1 -"  ></input>
                        <input type="hidden" name="e" value="<?php echo $row['img15']?>" >   </input>
                   
                    </div>

                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="img222" placeholder=" image 1 -"  ></input>
                        <input type="hidden" name="f" value="<?php echo $row['img16']?>" >   </input>

                    </div>

                </div>
                
                    <div class="col-sm-12 mt-3">
                        <button class="btn btn-warning btn-Add" name="btnSub" type="submit">Update Product</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</body>

</html>
