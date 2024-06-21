<?php
require_once("Conn.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>

    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#mytable2").dataTable();
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <style>
        th ,td{
            margin : 20px;      
        }
    </style>  
</head>

<body>
<?php include("nav.php"); ?>
    
<div>
        <h1 class="container-fluid text-center my-3">Order Details</h1>
    <table id="mytable2"class="table">
        <thead class="table-primary">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>price</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Order Date</th>
                <th>Image </th>
            </tr>
            </thead>
            <tbody>
            <?php 
                
                require_once('conn.php');
                                    
                    $sql = "SELECT ordered_item.pname,ordered_item.price,ordered_item.qty,ordered_item.size,ordered_item.odered,ordered_item.image, user.uname FROM ordered_item INNER JOIN user ON ordered_item.uid=user.uid";
                    
                    $result = mysqli_query($con,$sql);
                    $sr =1;
                    if($result){
                        while($row=mysqli_fetch_array($result)){
                            
                            $date= new DateTime($row['odered']) ;  

                            echo"<tr class='table-light'>
                                <td>".$sr++."</td>
                                <td>".$row['uname']."</td>
                                <td>".$row['pname'] ."</td>
                                <td>".$row['price'] ."</td>
                                <td>".$row['qty'] ."</td>
                                <td>".$row['size'] ."</td>
                                <td>".$date->format('Y-m-d')."</td>
                                <td> <img src = ../admin/". $row['image']." height=100px; style='width:75%;'/></td>
                                </tr>";
                                
                        }
                    
                    }	
                    else{
                        echo" Sorry this page is not working  ... Try after some time";
                    }
                
                    mysqli_close($con);
            ?>
</tbody>
        </table>
    </div>
</body>
</html>