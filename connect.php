<?php
    $mysql_host='localhost';
    $mysql_user='root';
    $mysql_pass='';
    $mysql_db='onlinebloodbankportal';
    $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
    if ($conn->connect_error)
    {
    	die("Connection failed: " . $conn->connect_error);
    }
?>