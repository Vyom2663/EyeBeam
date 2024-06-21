<?php

require_once('Conn.php');

if(isset($_POST['btnSub'])){

$upid2 = $_POST['upid2'];
// echo $upid2;
$pname = $_POST['pname'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $qty = $_POST['quantity'];
    $for = $_POST['for'];
    $des = $_POST['discription'];
    $size = $_POST['size'];
    $typ = $_POST['type'];
    $shape = $_POST['shape'];
    $material = $_POST['material'];
    $colour = $_POST['colour'];
   

    $img1 = $_FILES['img1'];
    $img11  = $_FILES['img11'];
    $img111  = $_FILES['img111'];
    
    $img2 = $_FILES['img2'];
    $img22  = $_FILES['img22'];
    $img222  = $_FILES['img222'];
  
    $filepath1= $filepath11=$filepath111=$filepath2=$filepath22=$filepath222="";

// img-1 url for image :- 
if(!empty($img1)){
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
}
//img 2 Url :-
if(!empty($img11)){
    
    $filename11 = $img11['name'];
    $fileerror = $img11['error'];
    $filetmppath = $img11['tmp_name'];

    $fileexplode = explode(".",$filename11);
    $filecheck = strtolower(end($fileexplode));

    $filevallidext2 = array('png' , 'jpeg' , 'jpg');

    if(in_array($filecheck ,$filevallidext )){
        $filepath11 = "upload/".$filename11;
        move_uploaded_file($filetmppath,$filepath11);

    }
    else{
        $img2err =" Image 2 Upload Error ..";
    }
}
    
// img-3 url for image :- 
if(!empty($img111)){

$filename111 = $img111['name'];
$fileerror = $img111['error'];
$filetmppath = $img111['tmp_name'];

$fileexplode = explode(".",$filename111);
$filecheck = strtolower(end($fileexplode));

$filevallidext= array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck,$filevallidext)){
    $filepath111 = "upload/".$filename111;
    move_uploaded_file($filetmppath,$filepath111);

}
else{
    $img1err =" Image 3 Upload Error ..";
}
}




if(!empty($img2)){

    $filename2 = $img2['name'];
    $fileerror = $img2['error'];
    $filetmppath = $img2['tmp_name'];
    
    $fileexplode = explode(".",$filename2);
    $filecheck = strtolower(end($fileexplode));
    
    $filevallidext= array('png' , 'jpeg' , 'jpg');
    
    if(in_array($filecheck,$filevallidext)){
        $filepath2 = "upload/".$filename2;
        move_uploaded_file($filetmppath,$filepath2);
    
}
else{
    $img2err =" Image 4 Upload Error ..";
}
}

if(!empty($img22)){

$filename22 = $img22['name'];
$fileerror = $img22['error'];
$filetmppath = $img22['tmp_name'];

$fileexplode = explode(".",$filename22);
$filecheck = strtolower(end($fileexplode));

$filevallidext2 = array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck ,$filevallidext )){
    $filepath22 = "upload/".$filename22;
    move_uploaded_file($filetmppath,$filepath22);

}
else{
    $img2err =" Image 5 Upload Error ..";
}
}

if(!empty($img222)){

$filename222 = $img222['name'];
$fileerror = $img222['error'];
$filetmppath = $img222['tmp_name'];

$fileexplode = explode(".",$filename222);
$filecheck = strtolower(end($fileexplode));

$filevallidext2 = array('png' , 'jpeg' , 'jpg');

if(in_array($filecheck ,$filevallidext )){
    $filepath222 = "upload/".$filename222;
    move_uploaded_file($filetmppath,$filepath222);

}
else{
    $img2err =" Image 2 Upload Error ..";
}
}



if(empty($filepath1)){
    $filepath1 = $_POST['a'];
    }

if(empty($filepath11)){
$filepath11 = $_POST['b'];
}


if(empty($filepath111)){
    $filepath111 = $_POST['c'];
    }

    
if(empty($filepath2)){
    $filepath2 = $_POST['d'];
    }
    
    
if(empty($filepath22)){
    $filepath22 = $_POST['e'];
    }

    
if(empty($filepath222)){
    $filepath222 = $_POST['f'];
    }




$sql = " UPDATE `product` SET `pname`='$pname',`brand`='$brand',`price`=$price,`quantity`=$qty,`for`='$for',`size`='$size',`type`='$typ',`colour`='$colour',`shape`='$shape',`material`='$material',`description`='$des',`img11`='$filepath1',`img12`='$filepath11',`img13`='$filepath111',`img14`='$filepath2',`img15`='$filepath22',`img16`='$filepath222' WHERE `product`.`pid`= $upid2 ";
// $sql = "UPDATE `product` SET `pname`='[value-2]',`brand`='[value-3]',`price`='[value-4]',`quantity`='[value-5]',`for`='[value-6]',`catagory`='[value-7]',`size`='[value-8]',`description`='[value-9]',`img11`='[value-10]',`img12`='[value-11]',`img13`='[value-12]' WHERE `pid`='$upid2'";
$result = mysqli_query($con,$sql); 


if($result){
    echo "succesfully updated";
    header("location:DisplayProduct.php");
}
else
{
    
    echo"Error". mysqli_error($con);
}
 }
?>