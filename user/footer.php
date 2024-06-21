<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer{
          padding: 20px 0;
            background-color: rgb(36, 35, 35);
            height: 290px;
            color: aliceblue;
        }
        i{
          color : #ffffff;
          margin:0 20px 0 0;
        }
        /* strong{
          text-decoration: underline;
        } */
        .f{
          display: flex;
          margin: 20px 50px;
        }
        .f1{
          width : 30%;
        }
        .f2{
          width : 40%;
          padding :0 0 0 50px;
          display: flex;
        }
        .f22 a{
          text-decoration : none;
          color: white;
        }
        .f3{
          width : 30%;
        }
    </style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <title>Document</title>
</head>
<body>
<footer>
  <div class="f">
  <div class="f1">
      <p><strong>CUSTOMER SUPPORT :</strong></p>
      <p>Call / WhatsApp : +91 9900996677</p>
      <p>Email : support@eyebeam.com</p>
      <p>Time : 10:00 AM - 06:00 PM ( Monday-Saturday )</p>
      <a href="https://www.facebook.com"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
      <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    </div>
    <div class="f2">
    <div style="margin:0 0 0 20px;">
    <p><strong>ONLINE SHOPPING :</strong></p>
    <div class="f22">
      <a href="Men.php" class="Link Link--primary">Men's Glasses</a><br>
      <a href="Women.php" class="Link Link--primary">Women's Glasses</a><br>
      <a href="Kids.php" class="Link Link--primary">Kid's Glasses</a><br>
      <a href="Index.php" class="Link Link--primary">All About</a><br>
    </div>
    </div>
    <div style="margin:0 0 0 50px;">
    <p><strong>INFORMATION :</strong></p>
    <div class="f22">
      <a href="about.php" class="Link Link--primary">About us</a><br>
      <a href="contactus.php" class="Link Link--primary">Contact Us</a><br>
      <a href="about.php" class="Link Link--primary">Privacy Policy</a><br>
      <a href="service.php" class="Link Link--primary">Our Stores</a><br>
    </div>
    </div>
    </div>
    <div class="lg:w-1/4 md:w-1/2 w-full px-5 f3">
    <p><strong>NEWSLETTER</strong></p>
        <p class="text-gray-500 text-sm mt-2 md:text-left">Subscribe to receive updates,
          <br class="lg:block hidden">access to exclusive deals,
          <br class="lg:block hidden">and more.
        </p>
        <div class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-start">
          <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
            <input type="text" id="footer-field" name="footer-field" class="w-full bg-gray-800 rounded border bg-opacity-40 border-gray-700 focus:bg-transparent focus:ring-2 focus:ring-indigo-900 focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Enter Your Email Address">
          </div>
          <button style=" background-color : #18af9f;
            color :white;
            padding:6px 25px 6px 25px;
            border :1px solid black;
            border-radius:4px;
            margin:20px 0 0 0; ">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</footer>
</body>
</html>
