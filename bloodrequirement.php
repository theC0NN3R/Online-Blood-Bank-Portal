<?php
    session_start();
        require_once 'connect.php';
        require_once 'core.php';
        if(empty(isset($_SESSION["user_id"]))){
        header("Location: home.php");
        exit;
        }
        if(isset($_POST['bloodrequirement']))
        {
        	$_SESSION["blood_group"] = $_POST["InputBloodGroupRequirement"];
        	header("Location: result.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="StyleSheet/bloodrequirement.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class = "bloodrequirement-box">
		<img src="Images/indexUserIcon.png" class = "bloodrequirement-user-icon">
		<h1>Enter Blood Requirements Here</h1>
		<form name="bloodrequirementform" action="bloodrequirement.php" method="post" enctype="multipart/form-data">			
		<p>Blood Type</p>
		<select name="InputBloodGroupRequirement">
                        <option value="O+">O+</option> 
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option> 
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option> 
                    </select>
			<input type="submit" name="bloodrequirement" value="Check Blood Availability">
			<a href="homepage.php">Click here to go back!</a>
		</form>
	</div>
</body>
</html>
