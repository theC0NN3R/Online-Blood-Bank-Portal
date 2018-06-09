<?php
    session_start();
    require_once 'connect.php';
    require_once 'core.php';
    if(empty(isset($_SESSION["user_id"]))){
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank Redirect</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet/updateprofilesuccess.css">
</head>
<body>
	<div class="topnav">
             <a href="logout.php">Logout</a>
             <a href="updateprofile.php">Update Profile</a>
             <a href="profile.php">View Profile</a> 
             <a href="homepage.php">Home</a>
    </div>
	<div class = "updateprofilesuccess-box">
		<img src="Images/indexUserIcon.png" class = "updateprofilesuccess-user-icon">
		<h1>Profile Updated Successfully</h1>
		<form>
			<p>Your profile has been updated successfully.</p>
			<input type="button" value="Click here to view your profile" onclick="window.location.href='profile.php'" />
		</form>
	</div>
</body>
</html>