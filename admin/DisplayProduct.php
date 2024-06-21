<?php
require_once("Conn.php");
require_once("nav.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page - Home</title>

    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myTable1").dataTable();
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        
</head>

<body>
    <h1 class="container-fluid text-center mt-3">Product list </h1>
    <div>
    <table id="myTable1" class="table align-middle table-responsive">
        <thead class="table-primary">
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Brand</th>
                <th>for</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
                <?php 
                    // $sql = "SELECT `pid`, `pname`, `brand`, `price`, `quantity`, `for`, `catagory`, `size`, `description`, `img11`, `img21`, `img31` FROM `product` Where pid=11;"
 
					require_once('conn.php');
				
						$sql = "select * from product ";

						$result = mysqli_query($con,$sql);
                        $sr =1;
						if($result){
							while($row=mysqli_fetch_array($result)){
								echo"<tr class='table-light'>
									<td>".$sr++."</td>
									<td>".$row['pname'] ."</td>
									<td>".$row['brand'] ."</td>
                                    <td>".$row['for']."</td>
									<td>".$row['price'] ."</td>
									<td>".$row['quantity'] ."</td>
									<td> <img src = ". $row['img11']." height=100px; style='width:75%;'/></td>
                                    
									<td> 
									<div class='justify-content-center'>

                                    <form action='ViewProduct.php' method='GET'>
									<button type='submit' name='btnview' class='btn btn-primary btnup mb-2 px-4'>View</button>
										<input type='text' hidden value = ".$row['pid']. " name = 'pid'>
									</form>

									<form action='UpdateProduct.php' method='post'>
									<button type='submit' name='btnup' class='btn btn-warning btnup mb-2 px-3'>Update</button>
										<input type='text' hidden value = ".$row['pid']. " name = 'upid'>
									</form>
									<form action='DeleteProduct.php' method='post'>
									
										<button type='submit' name='btndel' class='btn btn-danger btndel px-3'>Delete</button>
										<input type='text' hidden value = ".$row['pid']. " name = 'delid'>
                                        
										
									</form>
                                    </div>
									</td>
									</tr>";
									
							}
						}
						mysqli_close($con);
					
				?>
        </tbody>
    </table>
    </div>
</body>
</html>