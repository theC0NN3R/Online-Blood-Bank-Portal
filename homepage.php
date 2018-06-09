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
	    <title>Blood Bank</title>
	    <link rel="stylesheet" type="text/css" href="StyleSheet/homepage.css">
    </head>
    <body>
        <div class="topnav">
             <a href="logout.php">Logout</a>            
             <a href="profile.php">Profile</a>
             <a class="active" href="#home"">Home</a> 
        </div>
        <div class="h1">
<h1>You can call us on +91-9876543210</h1>

</div>
    <div class="body">

<div class="grid-container">
<div>Blood Requirement?
          <br><br>
                    <button type="button" class="button button1" onclick="location.href='bloodrequirement.php';">Click here</button>
</div>
<div>Check your profile
          <br><br>
                    <button type="button" class="button button2" onclick="location.href='profile.php';">Check profile</button>
</div>
</div>
</div>

    </body>
</html>