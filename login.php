
<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet/login.css">
</head>
<body>
	<div class = "login-box">
		<img src="Images/indexUserIcon.png" class = "login-user-icon">
		<h1>Login Here</h1>
		<form name="loginform" action="login.php" method="post" enctype="multipart/form-data">
<?php
    if(isset($_POST['login'])) {
    	session_start();
	    require_once 'connect.php';
	    require_once 'core.php';
	    $useremail=$_POST['InputEmail'];
	    $userpassword=$_POST['InputPassword'];
	    $password_hash=md5(md5($userpassword));
            if(!empty($useremail)&&!empty($userpassword)) {
	            $query="SELECT `customerID` FROM `registration` WHERE 
	            `customerEmail`='".mysqli_real_escape_string($conn,$useremail)."' AND `customerPassword`='".mysqli_real_escape_string($conn,$password_hash)."'";
	            $result = mysqli_query($conn,$query);
	            if(mysqli_num_rows($result)==1)	{
	            $user_id = $result->fetch_array()['customerID'];
 	            $_SESSION["user_id"]=$user_id;
 	            header('Location: homepage.php');
	        }
	        else { 
		        echo "Wrong username/password combination";
            }
      	}
    }
?><br><br>


		<p>Email ID</p>
			<input type="text" name="InputEmail" placeholder="Enter email address" required="required">
			<p>Password</p>
			<input type="password" name="InputPassword" placeholder="Enter password" required="required">
			<input type="submit" name="login" value="Login">
			<a href="signup.php">New user? Click here to join!</a>

</form>
	</div>
</body>
</html>