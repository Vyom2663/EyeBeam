<?php

require_once('conn.php');
session_start();

if(isset($_POST['btnSubmit'])){
if(isset($_SESSION['loggedin'])){

  $uid=$_SESSION['uid'];
  $uname = $_POST['name']; 
  $email = $_POST['email']; 
  $feedback = $_POST['feedback']; 

  $new_query = "INSERT INTO `feedback`(`fid`, `uid`, `uname`,`email`, `comment`, `time`) VALUES ('','$uid','$uname','$email','$feedback',CURRENT_TIMESTAMP())";          
  $new_cart = mysqli_query($con, $new_query);
  if($new_cart){
    echo"<script>alert('Thanks For Your Valueable Feedback ..');</script>";
  
  }
}
else{
  echo"<script>alert('First Login Yourself');</script>";
  echo"<script>window.location = 'Login.php'</script>";		
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <title>Contact Us Page</title>
</head>
<body>
<div class="bgi">
<?php include("_navbar.php")?>
<h1>Contact Us</h1>
</div>
<h6 style="margin: 10px 75px;"> <a href="index.php">Home </a> / Contact Us</h6>
<div class="line"></div>
<div class="contact container">
    <div class="contact-i"><img src="../img/contact.png" alt="contact"></div>
    <div class="mt-3 contact-f">
  <form action="contactus.php" method="post">
    <div class="mb-3 mt-3">
    <label for="email">Your Name :</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Your Email:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Your Comment :</label>
      <textarea class="form-control ta" name="feedback" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
  </form>
</div>
</div>
<div class="line"></div>
<div class="contact-a">
<div class="contact-b">
<h5>Please Do Get In Touch!</h5>
<p>We'd love to hear from you - Please use the form to send us your message or ideas.</p>
<p>285/F,  Vesu, VIP Street <br>
Surat -395009,<br>
Gujarat</p>
<p>Email: corporate@eyebeam.com <br>
Contact Number: 9000909909 / 9000910910</p>
<div class="line-b"></div>
<p style="padding:10px 0;">OPENING HOURS: <br>
Monday to Saturday : 10 am - 7 pm <br>
Sundays : Closed</p>
</div>
</div>
<?php include("footer.php")?>
</body>
</html>