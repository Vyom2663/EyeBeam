<?php
require_once("Conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        table img{
            width :80px;
        }
    </style>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#mytable4").dataTable();
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>

<body>
<?php include("nav.php"); ?>
    
    <h1 class="container-fluid text-center my-3">User Information</h1>
    <div>
    <table id="mytable4" class="table" >
        <thead class="table-primary">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>pic</th>
            </tr>
            </thead>
            <tbody>
            <!-- <tr class='table-light'> -->
            <?php 
 
					require_once('conn.php');
				
						$sql = "select * from user ";

						$result = mysqli_query($con,$sql);
                        $sr =1;
						if($result){
							while($row=mysqli_fetch_array($result)){
								echo"<tr class='table-light' style='text-align:center'>
									<td>".$sr++."</td>
									<td>".$row['uname'] ."</td>
									<td>".$row['email'] ."</td>
									<td>".$row['phone'] ."</td>
									<td> <img src = ". $row['image']." height=100px; style='width:40%;'/></td>
									</tr>";
									
							}
						}
						mysqli_close($con);
					
				?>
                
            <!-- </tr> -->
</tbody>
        </table>
    </div>
</body>
</html>