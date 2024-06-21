<?php
// Include conn file
require_once "conn.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $image = $phone = "" ;
$username_err = $password_err = $confirm_password_err = $email_err = $img_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    // Validate username
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
        $sql = "SELECT uid FROM user WHERE uname = ?";
        
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
                    $username_err = "This username is already taken.";
                } 
                else
                {
                    $username = trim($_POST["username"]);
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
    // validate email 
	
			$email = trim($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
			$email_err = "Invalid email format";
			}
			else if(empty($email))
			{
			$email_err = "please insert a email ! ";
			}
			else
			{
			$email = trim($_POST["email"]);
			}
			
    // validate Phone Number :- 

            $phone = trim($_POST["phone"]);
            
            if(preg_match('/^[0-9]{10}+$/', $phone)) {
                $phone= trim($_POST["phone"]);
            } 
            elseif(count_chars('$phone')==10){
                $phone= trim($_POST["phone"]);
                
            }
            else
             {
                $phone_err =  "Invalid Phone Number";
                }
            
    // Validate password
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";     
    } 
	elseif(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    } 
	else
    {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
	{
        $confirm_password_err = "Please confirm password.";     
    } 
	else
	{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
		{
            $confirm_password_err = "Password did not match.";
        }
    }

    $image = $_FILES['img'];
    $filename = $image['name'];
    $fileerror = $image['error'];
    $filetmppath = $image['tmp_name'];

    $fileexplode = explode(".",$filename);
    $filecheck = strtolower(end($fileexplode));

    $filevallidext= array('png' , 'jpeg' , 'jpg');

    if(in_array($filecheck,$filevallidext)){
        $filepath1 = "../admin/upload/".$filename;
        move_uploaded_file($filetmppath,$filepath1);

    }
    else{
        $img_err =" Image  Upload Error ..";
    }


    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)&& empty($phone_err)&& empty($img_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO `user` (`uname`, `email`,`phone`, `password`,`image`) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email,$param_phone, $param_password,$param_image);
            
            // Set parameters
            $param_name = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_email = $email;
            $param_phone = $phone;
            $param_image = $filepath1;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
                header("location: Login.php");
            } else
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

    <title>Register | EYE-BEAM</title>

    <link href="../admin/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</head>
    <body>
    <div class="hero">
    <video autoplay loop muted plays-inline class="bg-video">
      <source src="../video/video.mp4" type="video/mp4" class="bg-video">
    </video>

    <nav>
    <a class="navbar-brand logo" href="index.php"><img src="../img/logo2.png" style="width:120px ; align-center;"></img></a>

      <!-- <img src="../image/LOGO.png" alt="EYE-BEAM" class="" height="60px"> -->
      
      <ul>
        <li><a href="Login.php">Login </a></li>
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>

        <div class="content" style="margin-top:110px;">
            <h2 style="padding: 0 0 0 25px;"><i>Register Your self and join us ...! </i></h2>
            <!-- <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                <label for="username" class="form-label"></label>
                <input type="text" class="form-control" id="username" placeholder="username">

                <label for="email" class="form-label"></label>
                <input type="email" class="form-control" id="email" placeholder="email">

                <label for="password" class="form-label"></label>
                <input type="password" class="form-control" id="password" placeholder="Password">

                <label for="cpassword" class="form-label">  </label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password ">

                <button type="submit" class="btn">Submit</button>

            </form> -->




            <form method="POST" class="register-form" id="register-form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " enctype="multipart/form-data">
                            <div class="form-field d-flex align-items-center">
                                <input type="text" name="username" id="username" placeholder=" Your Name " class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"> 
									<span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                            <div style="display:flex;">
                            <div class="form-field d-flex align-items-center" style="margin:0 -30px 0 0">  
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Your Contact Number" style="padding:5px 75px;" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $phone_err; ?></span>
                            </div>
                            <div class="form-field d-flex align-items-center">  
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" style="padding:5px 75px;" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            </div>	
                            <div style="display:flex;">
                            <div class="form-field d-flex align-items-center" style="margin:0 -30px 0 0;">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" style="padding:5px 75px;" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
								<span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
							<div class="form-field d-flex align-items-center">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" style="padding:5px 75px;" placeholder="Repeat your password" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
								<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>
                            </div>
                            <div class="form-field d-flex align-items-center">  
                                <label for="image"><i class="zmdi zmdi-image"></i></label>
                                <input type="file" class="form-control <?php echo (!empty($img_err)) ? 'is-invalid' : ''; ?>" accept="image/jpeg, image/png, image/jpg" name="img"></input>
									<span class="invalid-feedback"><?php echo $img_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input style="padding : 7px 299px; " type="submit" name="signup" id="signup" class="mt-3 btn" value="Register"/>
                            </div>
                        </form>
        </div>

    </div>

</body>

</html>