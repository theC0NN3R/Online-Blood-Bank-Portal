<?php 
    session_start();
    require_once 'connect.php';
    require_once 'core.php';
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank Redirect</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet/signupredirect.css">
</head>
<body>
	<div class = "redirect-box">
		<img src="Images/indexUserIcon.png" class = "redirect-user-icon">
		<h1>Logged out successfully</h1>
		<form>
			<p>Your account has been logged out successfully.</p>
			<input type="button" value="Click here to login" onclick="window.location.href='home.php'" />
		</form>
	</div>
</body>
</html>