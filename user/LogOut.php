<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location:Login.php");
    exit;
}
?>

<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: Login.php");
exit;
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lOG-OUT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
            body{ font: 14px sans-serif; text-align: center; }
            body {
        background-color: #9c27b05e;
      }
	  .container{
	      /* border: 10px solid #ffffff; */
		  border-radius: 50px;
    		background-color: #ffffff6b;
	  }
    </style>
</head>

<body>
<!-- <php include('usernavbar.php'); ?>  -->
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["uname"]); ?></b></h1>
    <p>
		<center>
        <a href="LogOut.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
		</center>
    </p>
</body>
</html>