<?php 

session_start();

require_once("Conn.php");
require_once("_navbar.php");
require_once("_productCard.php");

    if (isset($_POST['remove'])){
      if(isset($_SESSION['loggedin'])){
            $cid = $_POST['cid'];
            $sql = "DELETE FROM cart WHERE `cart`.`cid` = $cid";
            $result = mysqli_query($con,$sql); 
                      
            if($result){
                echo "<script>alert('Product has been Removed...!');</script>";
                echo "<script>window.location = 'CartDetails.php';</script>";
            }
            else{
                echo"erorr". mysqli_error($con);
            }
          }
    }

    if(isset($_POST['btnedit'])){
      $cid = $_POST['cid'];
  
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details </title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/sps.css"/> -->
    <style>
      .counter {
        width: 120px;
        margin: 0 0 15px 0;
        display: flex;
        border: 0.5px solid black;
        border-radius : 5px;
      }
      .counter input {
        width: 50px;
        border: 0;
        line-height: 30px;
        font-size: 20px;
        padding:0;
        text-align: center;
        appearance: none;
        outline: 0;
      }
      .counter span {
        font-size: 25px;
        padding: 0 10px 0 10px;
        cursor: pointer;
        user-select: none;
      }
      .up{
        border-left: 0.5px solid black;
      }
      .down{
        border-right: 0.5px solid black;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
      function increaseCount(a, b) {
      var input = b.previousElementSibling;
      var value = parseInt(input.value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      input.value = value;
    }
    function decreaseCount(a, b) {
      var input = b.nextElementSibling;
      var value = parseInt(input.value, 10);
      if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
      }
    }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h3 style="margin:20px 0 0 0;"> Cart :- </h3>
    </div>

    <div class="row">
        <div class="col-sm-8" style=" width:100%; display : block; ">
        
        <div class="container" style="margin:25px 50px; padding :20px; border:1px solid lightgrey; border-radius:5px; width:100%;">
        <?php 
                        if(isset($_SESSION['loggedin'])){

                            $uid = $_SESSION['uid'];

                            $sql = "select * from cart where uid = $uid";
                            $result = mysqli_query($con,$sql);

                                $total = 0;
                                while ($row = mysqli_fetch_assoc($result)){
                                        $cid = $row['cid'];
                                        $pid = $row['pid'];
                                        $pname = $row['pname'];
                                        $price = $row['price'];
                                        $image1 = $row['image'];
                                        $colour = $row['colour'];
                                        $size = $row['size']; 
                                        $qty = $row['qty'];   


                                                formComponent($pname,$price,$size,$colour,$image1,$pid,$cid,$qty);
                                                $amount = (int)$row['price'] * (int)$row['qty'];
                                                $total = $total + $amount;
                                }                        
                        }
                        else{
                            echo "Your cart is empty ..!";
                        }
                    ?>
                    </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="container" style="margin:30px 50px; padding :20px 50px 20px 20px; border:1px solid lightgrey; border-radius:5px; width:55%;">
                            <form action="Order.php" method="post">
                                <h3 class=""> Bill Details :- </h3>
                                <hr>

                                <?php
                                if(isset($_SESSION['loggedin'])){
                                $ciid = isset($cid);
                                    echo "<h6>Price ($count items) </h6>";
                                    echo "<h6>Delivery Charges : 0 </h6> <hr>";

                                    echo "<h6>Total Amount : $total </h6>

                                    <button type = 'submit' name='btnOrder' class='btn btn-success'>Place Order</button>
                                    <input type = 'hidden' value='$ciid'></input> 
                                    ";
                                    

                                    
                                    // else{
                                    // echo "<h6>Price (0 items)</h6>";
                                    // }
                                    }
                                    else{
                                      echo"<script>alert('First Login Yourself');</script>";
                                      echo"<script>window.location = 'Login.php'</script>";

                                    }
                                ?>
                            </form>

            </div>
        </div>

    </div>  


    <div class='modal fade' id='exampleModal1' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
       <div class='modal-dialog'>
         <div class='modal-content'>
           <div class='modal-header'>
             <h1 class='modal-title fs-5' id='exampleModalLabel'>New message</h1>
             <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
           </div>
           <div class='modal-body'>
             <form>
               <div class='mb-3'>
                 <label for='recipient-name' class='col-form-label'>Recipient:</label>
                 <input type='text' class='form-control' id='recipient-name'>
               </div>
               <div class='mb-3'>
                 <label for='message-text' class='col-form-label'>Message:</label>
                 <textarea class='form-control' id='message-text'></textarea>
               </div>
             </form>
           </div>
           <div class='modal-footer'>
             <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
             <button type='button' class='btn btn-warning'>Update</button>
           </div>
         </div>
       </div>
     </div>

</div>

       
</body>
</html>