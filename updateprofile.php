<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet/updateprofile.css">
</head>
<body>
	<div class="topnav">
             <a href="logout.php">Logout</a>
             <a class="active" href="#updateprofile">Update Profile</a>
             <a href="profile.php">View Profile</a> 
             <a href="homepage.php">Home</a>
    </div>
	<div class = "updateprofile-box">
		<img src="Images/indexUserIcon.png" class = "updateprofile-user-icon">
		   <h1>Update Profile</h1>
		   <form name="updateprofile" action="updateprofile.php" method="post" enctype="multipart/form-data">

<?php
        session_start();
        require_once 'connect.php';
        require_once 'core.php';
        if(empty(isset($_SESSION["user_id"]))){
        header("Location: login.php");
        exit;
        }
        if(isset($_POST['updateprofile']))
        {
            $userid = $_SESSION["user_id"];
            $userdob = $_POST["InputDOB"];
            $usergender = $_POST["InputGender"];
            $userbloodgroup = $_POST["InputBloodGroup"];
            $usercontact = $_POST["InputContact"];
            $useraddress = $_POST["InputAddress"];
            if(!empty($userid)&&!empty($userdob)&&!empty($usergender)&&!empty($userbloodgroup)&&!empty($usercontact)&&!empty($useraddress)&&!empty($_FILES['InputImage']['tmp_name'])&&file_exists($_FILES['InputImage']['tmp_name']))
            {
                $userimage = addslashes(file_get_contents($_FILES['InputImage']['tmp_name']));
                $query1 = "SELECT customerDOB from profile WHERE customerID = '$userid'";
                $result1 = mysqli_query($conn, $query1);
                if(mysqli_num_rows($result1)==1)
                {
                    $query3 = "UPDATE profile SET customerDOB='$userdob', customerGender='$usergender', customerBloodGroup='$userbloodgroup', customerContact='$usercontact', customerAddress='$useraddress', customerImage='$userimage' WHERE customerID='$userid'";
                    $result3 = mysqli_query($conn, $query3);
                    if($result3 == TRUE)
                    {
                        header("Location: updateprofilesuccess.php");
                    }
                    else
                    {
                        header("Location: updateprofilefail.php");
                    }
                }
                else
                {
                    $query2 = "INSERT INTO profile(customerID, customerDOB, customerGender, customerBloodGroup, customerContact, customerAddress, customerImage) VALUES ('$userid','$userdob','$usergender','$userbloodgroup','$usercontact','$useraddress','$userimage')";
                    $result2 = mysqli_query($conn,$query2);
                    if($result2 == TRUE)
                    {
                        header("Location: updateprofilesuccess.php");
                    }
                    else
                    {
                        echo "here";
                    }
                }
            }
            else
            {
                echo "All fields are required";
            }
            
        }
?><br><br>


	     	    <p>Date of Birth</p>
			    <input type="date" name="InputDOB" placeholder="Enter date of birth">
			    <p>Gender</p>
			    <label class="container">Female
                    <input type="radio" checked="checked" name="InputGender" value="Female">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Male
                    <input type="radio" name="InputGender" value="Male">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Others
                    <input type="radio" name="InputGender" value="Others">
                    <span class="checkmark"></span>
                </label> 
      			<p>Blood Group</p>
			        <select name="InputBloodGroup">
                        <option value="O+">O+</option> 
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option> 
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option> 
                    </select>
		     	<p>Contact Number</p>
	     		<input type="text" name="InputContact" placeholder="Enter the contact number">
	    		<p>Address</p>
		    	<input type="text" name="InputAddress" placeholder="Enter the address">
		    	<p>Image</p>
		     	<input type="file" name="InputImage" placeholder="Enter the image">
			<input type="submit" name="updateprofile" value="Update">
		</form>
	</div>
</body>
</html>