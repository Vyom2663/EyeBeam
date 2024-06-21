<?php
session_start();
require_once "conn.php";

if(isset($_POST['btnVerifyData'])){
$username = $_POST['username'];
$email= $_POST['email'];
$mobile= $_POST['phone'];

if(empty(trim($username)))
    {
        $username_err = "Please enter a username.";
    }
     elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
    {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } 
    else
    {
        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE uname = ?";
        
        if($stmt = mysqli_prepare($con, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                
                mysqli_stmt_store_result($stmt);   /* store result */
                
                if(mysqli_stmt_num_rows($stmt) == 1)
				{
                    $username = trim($_POST["username"]);
                    
                    $sql1 = "select * from user where uname= '$username'";
                    $result1 = mysqli_query($con,$sql1);
                    
                     if($result1){
                        while($row=mysqli_fetch_array($result1)){
                            $useremail = $row['email'];
                            $userphone = $row['phone'];
                            $uid = $row['uid'];

                            if($useremail==$email){
                                
                                if($userphone == $mobile){
                                   echo" <form action='UpdatePassword.php' method='Post'>
                                    <div style='border:1px solid lightgrey; margin:150px 450px; border-radius:5px;'>
                                      <h2 style='margin:45px 65px 30px 65px;'>Change Password</h2>
                                    <div style='margin:25px 75px 25px 25;'>
                                    <input type='password' name='password' id='pass' placeholder='Enter New Password' class='form-control'>
                                    <input type='password' name='confirm_password' id='confirm_password' placeholder='Repeat your password' required class='form-control'>
                                    <input type='hidden' name='uid' value ='$uid'>
                                    </div>
                                    <div style='margin:0 73px 25px 73px;'>
                                        <button type='Submit' class='btn btn-secondary' style='padding:6px 35px 6px 35px; margin-right:10px;'><a href='Login.php' style='text-decoration:none; color:#fff;'>Close</a></button>
                                        <button class='btn btn-primary' style='padding:6px 35px 6px 35px;'>Submit</button>
                                    </div>
                                    </div>
                                  </form>";
                                }
                                else{
                                    echo"<script>alert('Please insert Vallid Phone Number ..');</script>";
                                    echo"<script>window.location = 'Login.php'</script>";		

                                }

                            }
                            else{
                                    echo"<script>alert('Please insert Vallid Email ..');</script>";
                                    echo"<script>window.location = 'Login.php'</script>";		

                            }
                        }
                     }
                } 
                else
                {
                    $username_err = "Sorry This user name is not found..!";
                    echo"Sorry This user name is not found..!";
                echo"<script>window.location = 'Login.php'</script>";		

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking Data</title>
    
    <link href = "../admin/style.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel = "stylesheet" type="text/css"/>
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>


                                  
                                     
                                      
</body>
</html>