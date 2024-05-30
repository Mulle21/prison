S<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_email']))
    {   
      header("Location: ../Account/login.php"); 
    }
 

 if(isset($_POST["btnapply"])){
    $leaveID= date("Y").rand(100,509);  

//check if leave is still pending 
$selectquery="SELECT * FROM tblleave ORDER BY leaveID DESC LIMIT 1";
$result = $conn->query($selectquery)
$row = $result->fetch_assoc();
$status= $row['status'];

if ($status == 'Pending') {
$_SESSION['error'] ='Previous Leave Application is still pending';
} else {
    $sql = 'INSERT INTO tblleave(email,leaveID,start_date,end_date,reason,status) VALUES(:email,:leaveID,:start_date,:end_date,:reason,:status)';
    $statement = $dbh->prepare($sql);
    $statement->execute([
	':email' => $email ,
	':leaveID' => $leaveID,
	':start_date' => $_POST['txtstart_date'],
    ':end_date' => $_POST['txtend_date'],
	':reason' => $_POST['cmdreason'],
    ':status' => 'Pending'

    ]);
    if ($statement){
        $_SESSION['success']='Leave ID: '.$leaveID. ' '.'.Leave Application Was successful but pending Approval.';
    } else {
     $_SESSION['error']='Something went Wrong';

    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Leave Application| <?php echo $sitename ;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;?>">
</head>

<body>
 <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../<?php echo $rowaccess['photo'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span> </span> </a>
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

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>

<span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $sitename ;?></span>
                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>


        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                       
                        <li class="active"><strong>Leave Application </strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="col-md-12">

		 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create User </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form  action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
				 <div class="row">
				 
				  <div class="col-lg-4 col-md-4 form-group mb-2">
                    <label for="exampleInputEmail1">Full Name </label>
                    <input type="text" class="form-control" name="sfullname" id="exampleInputEmail1" size="77" value="" placeholder="">
                  </div>
				  
				  <div class="col-lg-4 col-md-12 form-group mb-2">
                   
                    <label for="exampleInputEmail1">Gender </label>
                    <input type="ssex" class="form-control" name="ssex" id="dob" size="77" value="" placeholder="" required="" required="">
                 
				  </div>

				<div class="col-lg-4 col-md-12 form-group mb-2">
                   
                    <label for="exampleInputEmail1">Date of Birth </label>
                    <input type="text" class="form-control" name="sdob" id="dob" size="77" value="" placeholder="" required="" required="">
                 
				  </div>
				  <div class="col-lg-4 col-md-12 form-group mb-2">
                   
                    <label for="exampleInputEmail1">Job Title</label>
                    <input type="text" class="form-control" name="sJobtitle" id="dob" size="77" value="" placeholder="" required="" required="">
                 
				  </div>
				  
	
				    <div class="col-lg-4 col-md-12 form-group mb-2">
                    <label for="exampleInputEmail1">phone </label>
                    <input type="tel" class="form-control" name="sphone" id="txtphone" size="77" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" placeholder="Enter Phone">
                  </div>
				  
				  <div class="col-lg-4 col-md-12 form-group mb-2">
                   
                    <label for="exampleInputEmail1">Email </label>
                    <input type="emial" class="form-control" name="semail" id="dob" size="77" value="" placeholder="" required="" required="">
                 
				  </div>
                   <div class="col-lg-4 col-md-12 form-group mb-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="spassword" id="exampleInputPassword1" size="77" value="<?php if (isset($_POST['txtpassword']))?><?php echo $_POST['txtpassword']; ?>" placeholder="Enter Password">
                  </div>

           
           <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                       </p>

                    <p class="text-center">
                   <img src="../<?php echo $sphoto; ?>" alt="user image" width="178" height="154" id="logo-img">
				    </p>
              </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btncreate" class="btn btn-primary">Create User</button>
                </div>
              </form>
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
			<form role="form" method="POST">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Inmate information</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						 
									<div class="col-sm-4 b-r">
                                    <label>ID NO</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>First Name</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>Father Name</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Last Name</label></strong>
                                    <input type="text" name="txtend_date" value="" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>Gender</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Select Reason</option>
                                                    <option value="Sick Leave">Sick Leave</option>
                                                    <option value="Study Leave">Study Leave</option>
                                                    <option value="Monthly Leave">Monthly Leave</option>
                                                    <option value="Study Leave">Study Leave</option>
                                                    <option value="Maternity Leave">Maternity Leave</option>

                                                    </select>                                   
                                                 </div>
									 <div class="col-sm-4 b-r">
									<label>Date Of Birth</label></strong>
                                    <input type="date" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>City</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>rovince:</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Marital status</label></strong>
                                    <input type="date" name="txtend_date" value="" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Phone</label></strong>
                                    <input type="number" name="txtend_date" value="" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
                                    <div>
                                        
                                    </div>
                               
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
			<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lawyer of choice</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						 
                            <div class="col-sm-4 b-r">
                                    <label>Name:</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>E-mail</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>Phone</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Solicitor</label></strong>
                                    <input type="text" name="txtend_date" value="" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
                                    <div>
                                        
                                    </div>
                               
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Charges / legal details</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
						 
                            <div class="col-sm-2 b-r">
							
                                    <label>Date of arrest / occurrence</label></strong>
                                    <input type="date" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-2 b-r">
                                    <label>Criminal Types</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Criminal Types</option>
                                                    <option value="Sick Leave">Criminal defence</option>
                                                    <option value="Study Leave">Criminal appeal</option>

                                                    </select>                                   
                                                 </div>
									
									<div class="col-sm-2 b-r">
                                    <label>Return date</label></strong>
									<input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									
									<div class="col-sm-2 b-r">
                                    <label>Court location:</label></strong>
									<input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									
                 
				 <div class="col-sm-2 b-r">
                                    <label>Plea</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Plea</option>
                                                    <option value="Sick Leave">YES</option>
                                                    <option value="Study Leave">NO</option>

                                                    </select>                                   
                                                 </div>
												 <div class="col-sm-2 b-r">
                                    <label>Bail hearing</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Bail hearing</option>
                                                    <option value="Sick Leave">YES</option>
                                                    <option value="Study Leave">NO</option>

                                                    </select>                                   
                                                 </div>
									<div class="col-sm-4 b-r">
                                    <label>Charges</label></strong>
                                    <input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Institution</label></strong>
                                    <input type="text" name="txtend_date" value="" placeholder="Enter New Password" class="form-control" required="">
                                    </div>
                                    <div>
                                        
                                    </div>
                               
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Appeal matters</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
							
                                    <label><div class="col-sm-4 b-r">
                                    <label>Birr</label></strong>
									<input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									<div class="col-sm-4 b-r">
                                    <label>Item</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Criminal Types</option>
                                                    <option value="Sick Leave">Phone</option>
                                                    <option value="Study Leave">Laptop</option>

                                                    </select>                                   
                                                 </div>
									
									<div class="col-sm-4 b-r">
                                    <label>Other</label></strong>
									<input type="text" name="txtstart_date" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
                               
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
              
			<button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnapply"><strong>Apply</strong></button>
			 </form>
            <div class="row"></div>
        </div>
		 </div>
		 
        

       


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="../css/popup_style.css">
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
</body>

</html>
