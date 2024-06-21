<?php
require_once("Conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Details</title>

    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myTable").dataTable();
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
    
    <h1 class="container-fluid text-center my-3">Reviews Details</h1>
    <div>
    <table id="myTable" class="table">
        <thead class="table-primary">
            <tr style="Background :blue;">
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Review Title</th>
                <th>Review </th>
                <th>Ratings </th>
                <th>Product Name </th>
                <th>Date</th>
                <th>Review Image</th>
                <th>Action </th>

            </tr>
            </thead>
            <tbody>

            <?php 
 
 require_once('conn.php');

     $sql = "SELECT review.rid,review.name,review.ratings,review.title,review.comment,review.posted,review.img, product.pname FROM review INNER JOIN product ON review.pid=product.pid";

     $result = mysqli_query($con,$sql);

     $sr =1;
     if($result){
         while($row=mysqli_fetch_array($result)){
             $date= new DateTime($row['posted']) ;  
             echo"<tr class='table-light'>
                 <td>".$sr++."</td>
                 <td>".$row['name'] ."</td>
                 <td>".$row['title'] ."</td>
                 <td>".$row['comment'] ."</td>
                 <td>".$row['ratings'] ."</td>
                 <td>".$row['pname'] ."</td>
                 <td>".$date->format('Y-m-d')."</td>
                 <td> <img src = ". $row['img']." height=100px; style='width:75%;'/></td>

                 <td><form action='DeleteReview.php' method='post'>						
                 <button type='submit' name='btndel' class='btn btn-danger btndel'>Disable</button>
                 <input type='text' hidden value = ".$row['rid']. " name = 'delid'>
                </form>
                </td>

                 
                 </div>
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