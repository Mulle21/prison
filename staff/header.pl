<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_staffID']))
    {   
      header("Location: ../Account/login.php"); 
    }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   

    <style type="text/css">
<!--
.style1 {color: #000000}
-->
    </style>
</head>

<body>

  <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                           
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['sfullname'];  ?> <b class="caret"></b></span> </span> 
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>	
			   <?php
			   include('sidebar.php');
			   
			   ?>
			        </ul>

        </div>
    </nav>