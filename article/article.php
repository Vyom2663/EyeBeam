<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <link rel="stylesheet" type="text/css" href="../css/spec.css"> 
    <title>Home</title>
</head>
<body>
<div class="bgi">
<?php 
session_start(); 
include("../user/_navbar.php")    
?>
<h1>Article</h1>
</div>
<div>
<!-- <div class="my-5 text-center" style="display:flex;"><div class="line2"></div> <h2> Featured Article </h2><div class="line2"></div></div> -->
<div class="container my-3 d-flex">
<div style="width:350px; margin: 0 10px;">
    <img src="../article/article3.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> WHY WEARING SUNGLASSES IN WINTER IS IMPORTANT </h5>
    <p>Eye-health experts contend that wearing sunglasses during the winter is more crucial than doing so during the summer months. Why?</p>
    <a href="../article/article1.php">Read More</a>
    </div>  
  </div>
  <div style="width:350px; margin: 0 10px;">
    <img src="../article/article5.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> SCARFACE SUNGLASSES: THE NEW LUXURY STANDARD </h5>
    <p>The Scarface Sunglasses are a new pair of sunglasses with the luxury standard. The frame is colored in gold, and the lenses are green in color.</p>
    <a href="../article/article2.php">Read More</a>
    </div>
  </div>
  <div style="width:350px; margin: 0 10px;">
    <img src="../article/article6.jpg" alt="article" style="width:100%;">
    <div style="margin: 10px;">
    <h5> WHAT YOU NEED TO KNOW ABOUT SUNGLASS AND EYE PROTECTION </h5>
    <p>Sunglasses are a popular fashion accessory for many, but these days you'll find that sunglasses can also provide protection for your eyes against the sun's harmful UV rays.</p>
    <a href="../article/article3.php">Read More</a>
    </div>
  </div>
</div>

<div class="container my-3">
    <div style="width:350px; margin: 0 10px;">
        <img src="../article/article8.jpg" alt="article" style="width:100%;">
        <div style="margin: 10px;">
        <h5> 6 SUNGLASS TRENDS TO HAVE YOUR EYES ON ALL TIME </h5>
        <p>You don't need to be planning a beach-bound vacation to take advantage of a number of the chicest eyeglasses trends for 
        the anytime. </p>
        <a href="../article/article4.php">Read More</a>
        </div>  
    </div>
</div>
<!-- <div class="text-center mb-5">
<a href="#"><button type="button" class="btn btn-outline-dark"> VIEW MORE ARTICLE </button></a>
</div> -->
</div>
<?php include("../user/footer.php")?>
</body>
</html>