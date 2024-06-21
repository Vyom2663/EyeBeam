<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "conn.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Check if username is empty
    if(empty(trim($_POST["username"])))
	{
        $username_err = "Please enter username.";
    } else
	{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"])))
	{
        $password_err = "Please enter your password.";
    } 
	else
	{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err))
	{
        // Prepare a select statement
        $sql = "SELECT uid, uname, password FROM user WHERE uname = ?";

        
        if($stmt = mysqli_prepare($con, $sql))
		{
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    
					if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["uid"] = $id;
                            $_SESSION["uname"] = $username;      
                            
                            
                            
                            // Redirect user to welcome page
                            header("location:index.php");
                        } 
						else
						{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid password";
                        }
                    }
                } 
				else
				{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username ";
                }
            } 
			else
			{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EYE-BEAM</title>
    
    <link href = "../admin/style.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel = "stylesheet" type="text/css"/>
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </head>
<body>
  <div class="hero">
  
    <video autoplay loop muted plays-inline class="bg-video">
      <source src="../video/video.mp4" type="video/mp4" class="bg-video">
    </video>

    <nav>
    <a class="navbar-brand logo" href="../admin/adminlogin.php"><img src="../img/logo2.png" style="width:120px ; align-center;"></img></a>
      
      <!-- <img src="../image/LOGO.png" alt="EYE-BEAM" height="60px"> -->
      
      <ul>
        <li><a href="Register.php">Register</a></li>
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
  
  <div class="content">
    <h1><i>Welcome to Eyebeam .. </i></h1>
    <!-- <form>
        
          <label for="username" class="form-label">User Name</label>
          <input type="text" class="form-control" id="username">
          

        
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password">
        
        
        <button type="submit" class="btn">Submit</button>
      </form> -->
      <?php 
        if(!empty($login_err))
        {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

      <form action = "login.php" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" class="form-control" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" class="form-control" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
            <hr style="margin:15px 40px;">
            <div style="text-align:center;">
            <a href="#" data-bs-toggle="modal" data-bs-target="#forgotpass" style="color:#fff;">Forgot Password</a>
            </div>
        </form>
    </div>
    
  </div>

    <div class="modal" id="forgotpass" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Enter Your Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="CheckData.php" method="Post">
      <div class="modal-body me-5">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        <input type="text" name="email" id="Email" class="form-control" placeholder="Email">
        <input type="text" name="phone" id="Phone No." class="form-control" placeholder="Phone No.">
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="btnVerifyData" data-bs-target="#continue" data-bs-toggle="modal" data-bs-dismiss="modal" >Continue</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>