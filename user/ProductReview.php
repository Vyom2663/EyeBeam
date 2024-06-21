<?php

session_start();
require_once('conn.php');


if(isset($_SESSION['loggedin'])){
    if(isset($_POST['btnReview'])){

      $uid = $_SESSION['uid'];
      $name = $_SESSION["uname"];
      $pid = $_POST['pro_id'];
      $ratings = $_POST['ratings'];
      $rtitle = $_POST['rtitle'];
      $review = $_POST['review'];
      $rimg = $_FILES['rimg'];
      $imgerr = "";

      $filename = $rimg['name'];
      $fileerror = $rimg['error'];
      $filetmppath = $rimg['tmp_name'];

      $fileexplode = explode(".",$filename);
      $filecheck = strtolower(end($fileexplode));

      $filevallidext= array('png' , 'jpeg' , 'jpg');

      if(in_array($filecheck,$filevallidext)){
          $filepath1 = "../admin/upload/".$filename;
          move_uploaded_file($filetmppath,$filepath1);

      }

      else{
          $imgerr ="Review Image Error .";
      }


      if(empty($imgerr)){
      $insert_items = "INSERT INTO `review`(`rid`, `uid`,`name`, `pid`,`title`, `comment`, `ratings`, `posted`, `img`) VALUES (' ','$uid','$name','$pid','$rtitle','$review','$ratings',current_timestamp(),'$filepath1')";
      $insert_items_query = mysqli_query($con, $insert_items);
      
      echo "<script>alert('Thanks For Your Review')</script>";
	    echo "<script>window.location = (\"index.php\")</script>";

      
    }
    

      

    }
  
  }
  else{
    echo "<script>alert('Thanks For Your Review')</script>";
      
      echo "<script>alert('Login Yourself First For Giving Review ..');</script>";
	    echo "<script>window.location = (\"Login.php\")</script>";
    }

?>