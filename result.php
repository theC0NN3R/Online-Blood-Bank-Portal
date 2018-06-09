<?php 
    session_start();
    require_once 'connect.php';
    require_once 'core.php';
    if(empty(isset($_SESSION["user_id"]))){
        header("Location: login.php");
        exit;
    }
    $userbg = $_SESSION['blood_group'];
    $query1 = "SELECT * FROM profile WHERE customerBloodGroup = '$userbg'";
    $result1 = mysqli_query($conn, $query1);
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Blood Bank</title>
	    <link rel="stylesheet" type="text/css" href="StyleSheet/result.css">
    </head>
    <body>
        <div class="topnav">
             <a href="logout.php">Logout</a>
             <a href="updateprofile.php">Update Profile</a>
             <a class="active" href="#viewprofile">View Profile</a> 
             <a href="homepage.php">Home</a>
        </div>
 <div class="h1">
<h1>Available Donors</h1>

</div>

<table>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Contact Number</th>
    <th>Address</th>
    <th>Blood Group</th>
  </tr>
  <?php
    while($row1=mysqli_fetch_array($result1))
    {
    	echo "<tr><td>" . '<img src="data:image/jpeg;base64,'.base64_encode($row1['customerImage'] ).'" width="100px" height ="100px" />' . "</td><td>";
    	$userid = $row1['customerID'];
    	$query2 = "SELECT * FROM registration WHERE customerID = '$userid'";
    	$result2 = mysqli_query($conn,$query2);
    	while($row2=mysqli_fetch_array($result2))
    	{
    		echo $row2["customerName"] . "</td><td>";  
    	}
    	echo $row1["customerContact"] . "</td><td>" . $row1["customerAddress"] . "</td><td>" . $_SESSION["blood_group"] . "</td></tr>";
    }
  ?>
</table>
    </body>
</html>