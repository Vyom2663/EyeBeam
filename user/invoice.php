<?php 

require_once('conn.php');
session_start();

if(isset($_SESSION['loggedin'])){

    if(isset($_GET['btninvoiceview'])){
        $invoice_id = $_GET['aid'];

    }
    else{
            $invoice_id=$_SESSION['invoice_id'];
        }
    $uid = $_SESSION['uid'];
    

    $sql = "SELECT * FROM `ordertbl` where order_id = $invoice_id";
	$result = mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_array($result)){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $mobile = $row['mobile'];
            $email = $row['email'];
            $address = $row['address'];
            $nearby = $row['nearby'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $date = $row['date'];
        
        }
    }
    else{
        echo"Error in Ordertbl querryy..!!";
    }

    $sql = "SELECT * FROM `payment_status` where orderid = $invoice_id";
	$result = mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_array($result)){
            $ptype = $row['type'];
            $pstatus = $row['status'];
            
        
        }
    }
    else{
        echo"Error in Payment Detail querryy..!!";
    }


    


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/inde.css"/> 
    <link rel="stylesheet" type="text/css" href="../css/specs.css"> 
    <title>Home</title>
</head>
<body>
<?php include("_navbar.php")?>
<div style="margin:25px 100px; border:1px solid lightgrey; border-radius:5px;">
<h1 style="text-align:center; margin:20px 0;">Invoice</h1>
<hr style="color:grey;">
<div class="d-flex my-4" style="line-height : 1.5;">
    <div style="margin: 0 25px;">
        <label for="">Consumer Name :</label>
        <label for=""><?php echo $fname;  echo" "; echo $lname;?></label><br>
        <label for="">Email :</label>
        <label for=""><?php echo $email; ?></label><br>
        <label for="">Phone :</label>
        <label for="">+91 <?php echo $phone; ?></label><br>
        <label for="">Shipping Address :</label>
        <label for=""><?php echo $address;  echo","; echo $nearby; echo","; echo"$city"; echo","; echo"$state"; echo"-"; echo"$zip";?></label><br>
    </div>
    <div style="margin: 0  0 0 600px;">
        <label for="">Invoice Date :</label>
        <label for=""><?php echo $date; ?></label><br>
        <label for="">Payment Type :</label>
        <label for=""><?php echo $ptype; ?></label><br>
        <label for="">Payment Status :</label>
        <label for=""><?php echo $pstatus; ?></label>
    </div>
</div>
<hr style="color:grey;">
<h2 style="text-align:center; margin:25px 0;">Ordered Item</h2>
<table class="table mb-5" >
    <thead class="table-active">
    <tr>
        <th>Sr.</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Amount</th>
    </tr>
    </thead>
    
    <?php 
        $sql = "SELECT * FROM `ordered_item` WHERE aid = $invoice_id";
        $result = mysqli_query($con,$sql);
        if($result){
            
            $total = 0;    

            $sr = 1;
            while($row=mysqli_fetch_array($result)){
                $pname = $row['pname'];
                $price = $row['price'];
                $quantity = $row['qty'];
                $size = $row['size'];
                $Amount = $price * $quantity;
                $total += $Amount;
                echo "<tr>
                <td>$sr</td>
                <td>$pname</td>
                <td>$size</td>
                <td>₹$price</td>
                <td>$quantity</td>
                <td>₹$Amount</td>
                </tr>";
                $sr++;
            
            }
        }
        else{
            echo"Error in Product Detail querryy..!!";
        }
    ?>
    
    
    
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="table-active">Total Amount</th>
        <td class="table-active">₹<?php echo $total ?></td>
    </tr>
</table>
<hr style="color:grey;">
<div class="d-flex my-4">
    <div style="width:33.33%; margin-left:50px; ">
    <p><strong>ADDRESS :</strong></p>
    <p>VR MALL,  Vesu, VIP Street <br>
    Surat -395001, Gujarat</p>
    <p>Email: corporate@eyebeam.com <br>
    Contact Number: 9000909909 / 9000910910</p>
    </div>
    <div style="width:33.33%; margin:0 100px;">
      <p><strong>CUSTOMER SUPPORT :</strong></p>
      <p>Call / WhatsApp : +91 9900996677</p>
      <p>Email : support@eyebeam.com</p>
      <p>Time : 10:00 AM - 06:00 PM 
        <br>( Monday-Saturday )</p>
    </div>
    <div style="width:33.33%">
    <p><strong>Thanks you for Your Purchase :</strong></p>
    <img src="../img/logo2.png" alt="" style="width:35%;">
    </div>
</div>
</div>
<?php include("footer.php")?>
</body>
</html>