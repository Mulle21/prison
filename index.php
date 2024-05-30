<?php
include('database/connect.php');
include('database/connect2.php');
include('inc/topbar.php');

if(isset($_POST['btnlogin']))
{

$staffID = $_POST['staffID'];
$spassword = $_POST['spassword'];

$sql = "SELECT * FROM tblstaff WHERE staffID='".$staffID."' and spassword = '".$spassword."'";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);

 $_SESSION["login_staffID"] = $row['staffID'];

 $count=mysqli_num_rows($result);
 if(isset($_SESSION["login_staffID"])) {
{

header("Location: staff/index.php");
}
}
else {
$_SESSION['error']=' Wrong Username and Password';
     }

}


?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home - Prison Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="P" />
    <meta name="keywords" content="" />
    <meta content="" name="author" />

    <!-- Pixeden Icon -->
    <link rel="stylesheet" type="text/css" href="css/pe-icon-7.css" />

    <!--Slider-->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/png" sizes="16x16" href="image/img.png">
    
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/toastr.css">

</head>
<body style="height:100vh;" class="d-flex flex-column">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>
    </div>

    <!--Navbar Start-->
   
    <!-- Navbar End -->
    
<section class="hero-7-bg position-relative bg-gradient-primary" id="home">
    <div class="hero-7-bg-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-title">
                    <h1 class="hero-7-title">
					 <img class="logo-size card-img-top w-auto" src="image/img.png" height="500" alt="">
                       
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="hero-login-form mx-auto p-4 rounded mt-5 mt-lg-0 bg-white">
                    <div class="text-center">
                         <div class="form-content h-100">
                        <div class="form-items card" style="z-index:100">
                            <div class="card-header d-flex flex-wrap">
                               <i class="fas fa-home fa-2x" title="home"></i></a><h2 class="mr-auto">Login</h2><div class="ml-auto"></div>
                            </div>
                            <div class="card-body">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Email Address" required id="txtemail" name="staffID" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="password" placeholder="Password" required id="spassword" name="spassword">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="form-button d-flex flex-wrap">
                                        <button name="btnlogin" type="submit" class="btn btn-dark">Login</button>
                                    </div>
                                    <div>
                                        <p>Not an Employee Yet? <a href="registration.php">forget Password</a></p>
                                    </div>
                                </div>

                        </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <img src="images/img1.jpg" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
    
</section>




    <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <!-- anime -->
    <script src="js/anime.min.js"></script>
    <!-- COUNTER -->
    <!-- carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Main Js -->
    <script src="js/app.js"></script>
    
    <script src="js/site.js"></script>
    <script src="js/general.js"></script>
    <script src="app-assets/vendors/js/toastr.min.js" type="text/javascript"></script>
    <script src="lib/jquery-validation/dist/jquery.validate.js"></script>
    
</body>
</html>
