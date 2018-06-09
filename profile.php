<?php 
    session_start();
    require_once 'connect.php';
    require_once 'core.php';
    if(empty(isset($_SESSION["user_id"]))){
        header("Location: login.php");
        exit;
    }
    $flag = TRUE;
    $userid = $_SESSION["user_id"];
    $query1 = "SELECT * FROM profile WHERE customerID = '$userid'";
    $result1 = mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)==1)
        $flag = TRUE;
    else
        $flag = FALSE;
    $query2 = "SELECT * FROM registration WHERE customerID = '$userid'";
    $result2 = mysqli_query($conn,$query2);
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Blood Bank</title>
	    <link rel="stylesheet" type="text/css" href="StyleSheet/profile.css">
    </head>
    <body>
        <div class="topnav">
             <a href="logout.php">Logout</a>
             <a href="updateprofile.php">Update Profile</a>
             <a class="active" href="#viewprofile">View Profile</a> 
             <a href="homepage.php">Home</a>
        </div>
    <div class = "profile-box">
    <?php
    if($flag == TRUE)
        {
            while($row1=mysqli_fetch_array($result1))
            {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['customerImage'] ).'" class ="profile-user-icon" />';
                while($row2=mysqli_fetch_array($result2))
                {
                    echo "<h1>" . $row2['customerName'] . "</h1>";
                    echo "<p>" . "Email:- " . $row2['customerEmail'] . "</p>";
                }
                echo "<p>" . "Date of Birth:- " . $row1['customerDOB'] . "</p>";
                echo "<p>" . "Gender:- " . $row1['customerGender'] . "</p>";
                echo "<p>" . "Blood Group:- " . $row1['customerBloodGroup'] . "</p>";
                echo "<p>" . "Contact Number:- " . $row1['customerContact'] . "</p>";
                echo "<p>" . "Address:- " . $row1['customerAddress'] . "</p>";
            }
        }
    else
        {
            echo '<img src="Images/indexUserIcon.png" class ="profile-user-icon" />';
            while($row2=mysqli_fetch_array($result2))
                {
                    echo "<h1>" . $row2['customerName'] . "</h1>";
                    echo "<p>" . "Email:- " . $row2['customerEmail'] . "</p>";
                }
                echo "<p>" . "Date of Birth:- " . "Not set" . "</p>";
                echo "<p>" . "Gender:- " . "Not set" . "</p>";
                echo "<p>" . "Blood Group:- " . "Not set" . "</p>";
                echo "<p>" . "Contact Number:- " . "Not set" . "</p>";
                echo "<p>" . "Address:- " . "Not set" . "</p>";
        }
    ?>
    </div> 
    </body>
</html>