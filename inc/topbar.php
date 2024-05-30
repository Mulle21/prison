<?php 
session_start();
error_reporting(1);
include('../database/connect.php'); 
include('../database/connect2.php'); 

//set time
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

//fetch user data
$staffID = $_SESSION["login_staffID"];
$stmt = $dbh->query("SELECT * FROM tblstaff  where staffID='$staffID'");
$rowaccess = $stmt->fetch();
$staffID=$rowaccess['staffID']; 
$sfullname=$rowaccess['sfullname']; 
$spassword=$rowaccess['spassword'];
$ssex=$rowaccess['ssex'];
$sdob=$rowaccess['sdob']; 
$sphone=$rowaccess['sphone'];   
$semail=$rowaccess['semail'];  
$sjobtitle=$rowaccess['sjobtitle']; 
$photo=$rowaccess['']; 


$logo='image/logo.png';
$logo2='image/logo.jpeg';

//fetch Inmate data

//system setting
$sitename='Prison Management system';

//admin
$username = $_SESSION["admin-username"];
$stmt = $dbh->query("SELECT * FROM admin where username='$username'");
$row_admin = $stmt->fetch();
$admin_fullname=$row_admin['fullname'];  
$admin_photo=$row_admin[''];  

?>