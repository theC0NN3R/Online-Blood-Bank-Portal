<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank Sign Up</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet/signup.css">
</head>
<body>
	<div class = "signup-box">
		<img src="Images/indexUserIcon.png" class = "signup-user-icon">
		<h1>Sign up Here</h1>
		<form name="signupform" action="signup.php" method="post" enctype="multipart/form-data">

<?php 
            require "core.php" ;
            require "connect.php";
            if (!loggedin())
            {
                if (isset($_POST['signup']))
                {
                    $username=$_POST['InputName'];
                    $useremail=$_POST['InputEmail'];
                    $userpassword=$_POST['InputPassword'];
                    $userpassword1=$_POST['InputPassword1'];
                    $password_hash=md5(md5($userpassword));
                        if(!empty($username)&&!empty($useremail)&&!empty($userpassword)&&!empty($userpassword1))
                        { 
	                        if(strlen($username)>20||strlen($useremail)>20||strlen($userpassword)>20) {
                                echo "The field is filled upto maxlength"; 
                            }
                            else {
                                if($userpassword!=$userpassword1) {
				     	            echo "Password does not match";
				                }
				                else {
				                    $query="SELECT `customerEmail` FROM `registration` WHERE `customerEmail`='".mysqli_real_escape_string($conn,$useremail)."'";
				                    $query_run = $conn->query($query);
                                    if(mysqli_num_rows($query_run)==1) { 
					                    echo 'The useremail '.$useremail.' already exists';
				                    }
                                    else {
				                        $query = "INSERT INTO `registration`(customerName,customerEmail,customerPassword) VALUES ('".mysqli_real_escape_string($conn,$username)."','".mysqli_real_escape_string($conn,$useremail)."','".mysqli_real_escape_string($conn,$password_hash)."')";
			                     	    $result = mysqli_query($conn,$query);
				                        if($result == TRUE) { 
					                        header("Location: signupredirect.php");
				                        }
				                        else {
					                        header("Location: signupredirecterror.php");	
			                            }
				                    }  
			
			                    }
		                    }
                        } 
                    else {
	                    echo "All fields are required";
	                }
                }
            }
        else {
            echo "You're already a user";
        }  ?> <br><br>




			<p>Name</p>
			<input type="text" name="InputName" placeholder="Enter name" maxlength="20" minlength="6" required>
			<p>Email ID</p>
			<input type="email" name="InputEmail" placeholder="Enter email address" required>
			<p>Password</p>
			<input type="password" name="InputPassword" placeholder="Enter password" maxlength="20" minlength="6" required>
			<p>Confirm password</p>
			<input type="password" name="InputPassword1" placeholder="Confirm password" maxlength="20" minlength="6" required>

			<input type="submit" name="signup" value="Sign Up">
			<a href="login.php">Already a member? Click here to login!</a>
		</form>
		<!-- PHP FILE STARTS HERE -->
		
    </div>
</body>
</html>