<?php 
session_start();
require_once "conn.php";
$uid = $_POST['uid'];
if(empty(trim($_POST["password"])))
    {
        echo"<script>alert('Please enter a password');</script>";
        echo"<script>window.location = 'Login.php'</script>";		

        $password_err = "Please enter a password.";     
    } 
	elseif(strlen(trim($_POST["password"])) < 6)
    {
        echo"<script>alert('Password must have atleast 6 characters');</script>";
        echo"<script>window.location = 'Login.php'</script>";		

        $password_err = "Password must have atleast 6 characters.";
    } 
	else
    {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
	{
        echo"<script>alert('Please enter confirm password');</script>";
        echo"<script>window.location = 'Login.php'</script>";		

        $confirm_password_err = "Please enter confirm password";     

    } 
	else
	{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
		{
            $confirm_password_err = "Password did not match.";
            echo"<script>alert('Password did not matched');</script>";
            echo"<script>window.location = 'Login.php'</script>";		


        }
    }
    if(empty($confirm_password_err) && empty($password_err)){
        $sql = "UPDATE `user` SET `password` = ? WHERE `user`.`uid` = $uid;";
         
        if($stmt = mysqli_prepare($con, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_password);
            
            // Set parameters
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
                echo"<script>alert('Password Updated successfully ..!!');</script>";
                echo"<script>window.location = 'Login.php'</script>";		
  
                // header("location: Login.php");
            } else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


?>