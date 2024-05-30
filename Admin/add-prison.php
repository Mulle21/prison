<?php 
include('../inc/topbar.php'); 

    if(isset($_POST["btnsubmit"])){
		$PID= 'STAFF/FKP/'.date("Y").'/'.rand(1000,5009); 
		 $sql = 'INSERT INTO prison(PID,pname,ptype,pstate,pzone,pcity) VALUES(:PID,:pname,:ptype,:pstate,:pzone,:pcity)';
	$statement = $dbh->prepare($sql);
    $statement->execute([
	':PID' => $PID ,
	':pname' => $_POST['pname'],
	':ptype' => $_POST['ptype'],
    ':pstate' => $_POST['pstate'],
	':pzone' => $_POST['pzone'],
    ':pcity' => 'pcity'
    ]);
    if ($statement){
      $_SESSION['success']='Registration was Successful';
    } else {
     $_SESSION['error']='Something went Wrong';

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New prison - <?php echo $sitename; ?></title>
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
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create User </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

		 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create prison </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">


                <div class="form-group">
                    <label for="exampleInputEmail1">Prison Name </label>
					<input type="text" class="form-control" name="pname" id="pname" size="77" value="" placeholder="Enter Username">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Prison types </label>
                    <input type="text" class="form-control" name="ptype" id="ptype" size="77" value="" placeholder="Enter Fullname">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">State </label>
                    <input type="text" class="form-control" name="pstate" id="pstate" size="77" value="" placeholder="Enter Fullname">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Zone</label>
                    <input type="text" class="form-control" name="pzone" id="pzone" size="77" value="" placeholder="Enter Fullname">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Citys </label>
                    <input type="text" class="form-control" name="pcity" id="pcity" size="77" value="" placeholder="Enter Fullname">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Create Prison</button>
                </div>
              </form>
            </div>
			</div>
			<div class="col-md-7">
          <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

		
			 
<div class="card card-primary card-outline">
                  <table width="85%" align="center" class="table table-bordered table-striped" id="example1">
                    <thead>
                    <th ><div align="center"><span class="style1">#</span></div></th>
					<th><div align="center"><span class="style1">prison Name</span></div></th>
              <th><div align="center"><span class="style1">prison Type</span></div></th>
              <th><div align="center"><span class="style1">State</span></div></th>
              <th><div align="center"><span class="style1">Zone</span></div></th>
              <th><div align="center"><span class="style1">City</span></div></th>
              <th><div align="center"><span class="style1">Action</span></div></th>

				     						    </tr>
                    </thead>
                      <div align="center"></div>

                    <tbody>
                    <?php
                  $data = $dbh->query("SELECT *  FROM prison order by pname DESC")->fetchAll();
                  $cnt=1;
                  foreach ($data as $row) {
                    ?>
                      <tr class="gradeX">
                      <td><div align="center" class="style2"><?php echo $cnt;  ?></div></td>
                       <td><div align="center" class="style2"><?php echo $row['pname'];  ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['ptype'];  ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['pstate'];  ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['pzone'];  ?></div></td>
						<td><div align="center" class="style2"><?php echo $row['pcity'];  ?></div></td>
			                   <td>
                           <div align="center">
                         <a href="delete-user.php?uid=<?php echo $row['username'];?>" onClick="return deldata('<?php echo $row['fullname']; ?>');">Delete </a></div>
                            </td>
                    </tr>
                    <?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>

                </div>
			
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
