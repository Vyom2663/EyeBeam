<?php 


include('conn.php');

if(isset($_POST['btnSubmit'])){
    $pro_name = $_POST['pname'];

    echo $pro_name;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <form action="INSERT_PRODUCT.php" method="post"> 
        <input type="text" class="pname" name="pname"/>
        <button type="submit" name="btnSubmit">Submit</button>
    </form>
</body>
</html>