<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/index.css"/> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
      .con{
  display: flex;
  margin: 7px;
}
.con img{
  width: 500px;
  border-radius: 10px;
}
.con .p{
  margin: 75px 50px 0 50px ;
}
hr{
  margin: 8px 0;
}
    </style>
</head>
<body>
<div class="bgi">
<?php include("_navbar.php")?>
<h1>About Us</h1>
</div>
<h6 style="margin: 10px 75px;"> <a href="index.php">Home </a> / About Us</h6>
<div class="line"></div>
<div>
  <div class="con">
  <div><img src="../img/about1.jpg"></div>
    <div class="p">
        <h4>INNOVATIVE LENS SOLUTIONS FROM EYEBEAM EXPERTS TO SUIT EVERY LIFESTYLE</h4>
        <p>Eyebeam Experts offer “Lenses designed as per your Lifestyle”. They are Expert eye care professionals who recommend Eyebeam lenses, the latest Eyebeam lens technologies to correct your vision and protect your eyes.</p>
        <!-- <p>For Extended Computer Use | For the Night-time Drivers | For Presbyopia | For the Bibliophiles | For the Lovers of Outdoors (Light Intelligent Lenses) | For the Sports Lover .</p> -->
      </div>
  </div>
  <hr>
  <div class="con">
  <div class="p">
        <h4>LATEST INTERNATIONAL FRAME BRANDS AND STYLES AT NEARBY EYEBEAM EXPERTS OPTICAL SHOP</h4>
        <p>Eyebeam Experts bring you the international standard of frame designs that are customized to make you look good and feel good! For your face type, they help you choose the right frame type from a variety of brands from across the globe.</p>
    </div>
    <div><img src="../img/about2.jpg"></div>
    </div>
    <hr>
  <div class="con">
  <div><img src="../img/about3.jpg"></div>
    <div class="p">
        <h4>HOW TO RECOGNIZE EYEBEAM EXPERTS OPTICIANS?</h4>
        <p>1. Essilor Experts eye care professionals are easy to identify thanks to the “Essilor Experts” sign on their store. </p>
        <p>2. You will also notice a certificate inside their store.</p>
        <p>3. Most importantly, Essilor Experts stand out for their unmatched expertise, for the personalized products they recommend and for the seamless experience they deliver. </p></div>
  </div>
</div>
<?php include("footer.php")?>
</body>
</html>