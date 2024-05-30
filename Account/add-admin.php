<?php
include('../inc/topbar.php');
if(empty($_SESSION['admin-username']))
    {
      header("Location: login.php");
    }


if(isset($_POST["btncreate"]))
{

$username = $_POST['txtusername'];
$name = $_POST['txtfullname'];
$password = $_POST['txtpassword'];
$phone = $_POST['txtphone'];

$file_type = $_FILES['avatar']['type']; //returns the mimetype
$allowed = array("image/jpg", "image/gif","image/jpeg", "image/webp","image/png");
if(!in_array($file_type, $allowed)) {
$_SESSION['error'] ='Only jpg,jpeg,Webp, gif, and png files are allowed. ';

// exit();

}else{
$image= addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
$image_name= addslashes($_FILES['avatar']['name']);
$image_size= getimagesize($_FILES['avatar']['tmp_name']);
move_uploaded_file($_FILES["avatar"]["tmp_name"],"../uploadImage/Profile/" . $_FILES["avatar"]["name"]);
$location="uploadImage/Profile/" . $_FILES["avatar"]["name"];

///check if username already exist
$stmt = $dbh->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
$_SESSION['error'] ='Username Already Exist in our Database ';

} else {
 //Add User details
$sql = 'INSERT INTO users(username,password,phone,fullname,photo) VALUES(:username,:password,:phone,:fullname,:photo)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':username' => $username,
	':password' => $password,
  ':phone' => $phone,
	':fullname' => $name,
	':photo' => $location

]);
if ($statement){
	$_SESSION['success'] ='User Added Successfully';
}else{
  $_SESSION['error'] ='Problem Adding User';
}
}
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inmate information  <?php echo $sitename; ?></title>
  <link rel="shortcut icon" href="../<?php echo $logo; ?>" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <img src="../<?php echo $logo2; ?>" alt=" Logo" width="150" height="130" style="opacity: .8">
	        <span class="brand-text font-weight-light"></span>    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../<?php echo $row_admin['photo'];    ?>" alt="User Image" width="140" height="141" class="img-circle elevation-2">        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row_admin['fullname'];  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

		    <?php
			   include('sidebar.php');

			   ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

		 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Inmate information </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <div class="card-body">
			   <form method="post" id="regForm" class="form form-horizontal" novalidate autocomplete="off" action="">
                                <div class="form-body">
								 <div class="row">
                                        <div class="col-lg-4 col-md-12 form-group mb-3">
										<label for="exampleInputPassword1">ID</label>
                                            <div class="controls">
                                                <input class="form-control" type="text" placeholder="First name" required data-validation-required-message="Full name is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
											
                                            <div class="controls">
											
                                                                  
										   </div>
                                        </div>
									<div class="col-lg-4 col-md-12 form-group mb-3">
										<label for="exampleInputPassword1">Image</label>
                                            <div class="controls">
											<input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                                              </div>
                                        </div>
										
                                    </div>
									
									 
								 <div class="row">
                                        <div class="col-lg-4 col-md-12 form-group mb-3">
                                            <div class="controls">
											<label for="exampleInputPassword1">First name</label>
                                                <input class="form-control" type="text" placeholder="First name" required data-validation-required-message="Full name is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-3">
										<label for="exampleInputPassword1">Medum name</label>
                                            <div class="controls">
                                                <input class="form-control" type="text" placeholder="First name" required data-validation-required-message="Full name is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-3">
										<label for="exampleInputPassword1">Last name</label>
                                            <div class="controls">
                                                <input class="form-control" type="text" placeholder="First name" required data-validation-required-message="Full name is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Gender</label>
                                            <select class="form-control" required data-validation-required-message="Select Emplooyee Type" data-val="true" data-val-required="The Employee Type field is required." id="cmdemployeetype" name="cmdemployeetype">
                                                    <option value="">Select Gender Type</option>
                                                    <option value="Worker">Worker</option>
                                                    <option value="Prisoner">Prisoner</option>
                                                    </select>
                                         </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Date of Birth</label>
                                                <input class="form-control" type="text" placeholder="DOB" required data-validation-required-message="DOB is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Country</label>
                                                <input class="form-control" type="text" placeholder="Date of Place" required data-validation-required-message="DOB is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">State/Region </label>
                                                <input class="form-control" type="text" placeholder="Date of Place" required data-validation-required-message="DOB is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">City</label>
                                                <input class="form-control" type="text" placeholder="Date of Place" required data-validation-required-message="DOB is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Wereda</label>
                                                <input class="form-control" type="text" placeholder="Date of Place" required data-validation-required-message="DOB is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Charge Court</label>
                                                <input class="form-control" type="text" placeholder="Marital status" required data-validation-required-message="Fullname is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Charge Date</label>
                                                <input class="form-control" type="text" placeholder="Marital status" required data-validation-required-message="Fullname is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Date of arrest </label>
                                                <input class="form-control" type="text" placeholder="Marital status" required data-validation-required-message="Fullname is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Charge Case</label>
                                                <input class="form-control" type="textbox" placeholder="Marital status" required data-validation-required-message="Fullname is required" data-val="true" data-val-required="The Fullname field is required." id="txtsurname" name="txtfullname" value="">
                                            </div>
                                        </div>
										<div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
										<label for="exampleInputPassword1">Marital status</label>
                                            <select class="form-control" required data-validation-required-message="Marital status" data-val="true" data-val-required="The Employee Department field is required." id="cmddept" name="cmddept">
                                                    <option value="">Marital status </option>
                                                    <option value="Civil Court">Civil Court</option>
                                                    <option value="Criminal Court">Criminal Court</option>
                                                    <option value="General jurisdiction courts">General jurisdiction courts</option>
                                                    <option value="Limited jurisdiction courts">Limited jurisdiction courts</option>
                                                    <option value="Constitutional Courts">Constitutional Courts</option>
                                                    <option value="Federal Courts">Federal Courts</option>
                                                    <option value="Transnational courts">Transnational courts</option>
                                                    <option value="Appellate Courts">Appellate Courts</option>
                                                    <option value="Trial Courts">Trial Courts</option>
                                                    <option value="Traffic Courts">Traffic Courts</option>
                                                    <option value="Admin">Admin</option>

                                                    </select>
                                            </div>
                                        </div>
										 <div class="col-lg-4 col-md-12 form-group mb-2">
                                            <div class="controls">
											<label for="exampleInputPassword1">Marital status</label>
                                            <select class="form-control" required data-validation-required-message="Select Employee Department" data-val="true" data-val-required="The Employee Department field is required." id="cmddept" name="cmddept">
                                                    <option value="">Select Court </option>
                                                    <option value="Civil Court">Civil Court</option>
                                                    <option value="Criminal Court">Criminal Court</option>
                                                    <option value="General jurisdiction courts">General jurisdiction courts</option>
                                                    <option value="Limited jurisdiction courts">Limited jurisdiction courts</option>
                                                    <option value="Constitutional Courts">Constitutional Courts</option>
                                                    <option value="Federal Courts">Federal Courts</option>
                                                    <option value="Transnational courts">Transnational courts</option>
                                                    <option value="Appellate Courts">Appellate Courts</option>
                                                    <option value="Trial Courts">Trial Courts</option>
                                                    <option value="Traffic Courts">Traffic Courts</option>
                                                    <option value="Admin">Admin</option>

                                                    </select>
                                            </div>
                                        </div>
										
                                    </div>
                                   <div class="row d-flex flex-wrap">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <button name="btnsubmit" type="submit" class="btn btn-dark">Submit</button>
                                            </div>
                                        </div>
                                      
                                    </div>

                                   
                                    </div>
                                   
                                   
                                </div>
								 <div class="card-body">
			  
              
			  
            </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col --><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)--><!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include('../footer.php');  ?>
    <div class="float-right d-none d-sm-inline-block">

    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong>
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong>
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
     <script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

</script>
</body>
</html>
