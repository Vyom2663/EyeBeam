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
$adminname = $password = "";
$adminname_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Check if adminname is empty
    if(empty(trim($_POST["adminname"])))
	{
        $adminname_err = "Please enter adminname.";
    } else
	{
        $adminname = trim($_POST["adminname"]);
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
    if(empty($adminname_err) && empty($password_err))
	{
        // Prepare a select statement
        $sql = "SELECT aid, aname, password FROM admin WHERE aname = ?";

        
        if($stmt = mysqli_prepare($con, $sql))
		{
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = $adminname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if adminname exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $adminname, $hashed_password);
                    
					if(mysqli_stmt_fetch($stmt))
					{
                       // if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $adminname;                            
                            
                            // Redirect admin to welcome page
                            header("location: index.php");
                        // } 
						// else
						// {
                        //     // Password is not valid, display a generic error message
                        //     $login_err = "Invalid password";
                        // }
                    }
                } 
				else
				{
                    // admin name doesn't exist, display a generic error message
                    $login_err = "Invalid admin name ";
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
    <a class="navbar-brand logo" href="../user/Login.php"><img src="../img/logo2.png" style="width:120px ; align-center;"></img></a>
      
      <!-- <img src="../image/LOGO.png" alt="EYE-BEAM" height="60px"> -->
      
      <ul>
        <!-- <li><a href="#">Register</a></li> -->
        <!-- <li><a href="#">Home</a></li> -->
      </ul>
    </nav>
  
  <div class="content">
    <h1><i>Welcome to Eyebeam .. </i></h1>
    <h1> Sign in </h1>
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

      <form action = "adminLogin.php" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="adminname" id="adminName" placeholder="Admin Name" class="form-control">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" class="form-control">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
    </div>
    
  </div>

</body>
</html>