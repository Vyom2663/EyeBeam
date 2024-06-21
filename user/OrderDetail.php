<?php
// include("_navbar.php");

require_once("Conn.php");


session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Order</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#order").dataTable();
        });
    </script>

    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        
</head>

<body>
<?php require_once("_navbar.php");?>
    
    <h1 class="container text-center mt-5">Oredred Product </h1>
    <div class="table-responsive">
    <div class="container col-sm-10">
    <table id="order" class="table align-middle mt-5 ">
        <thead class="table-primary">
            <tr>
                <th>Sr No.</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Img 1</th>
                <th>Invoice Detail</th>
            </tr>
        </thead>

        <tbody>
                <?php 
                

                    if(isset($_SESSION['loggedin']))
				{
                    $uid = $_SESSION['uid'];
					require_once('conn.php');
                                        
						$sql = "select * from ordered_item where uid = '$uid'";
                        
						$result = mysqli_query($con,$sql);
                        $sr =1;
						if($result){
							while($row=mysqli_fetch_array($result)){
								echo"<tr class='table-light'>
									<td>".$sr++."</td>
									<td>".$row['pname'] ."</td>
									<td>".$row['price'] ."</td>
									<td>".$row['size'] ."</td>
									<td>".$row['qty'] ."</td>

									<td> <img src = ../admin/". $row['image']." height=100px; style='width:55%'/></td>

                                    <td><form action='invoice.php' method='GET'>
									<button type='submit' name='btninvoiceview' class='btn btn-primary btnup mb-2 px-4'>View</button>
										<input type='text' hidden value = ".$row['aid']. " name = 'aid'>
									</form>
									</td>
									</tr>";
									
							}
                        
                        }	
                        else{
                            echo" Sorry this page is not working  ... Try after some time";
                        }
                    }
                    else{
                        echo"<script>alert('login Yorself first')</script>";
                        echo"<script>window.location=(\"Login.php\")</script>";
                    

                    }
						mysqli_close($con);
				?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>