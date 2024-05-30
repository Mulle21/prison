<?php 
include('../inc/topbar.php'); 
if (empty($_SESSION['login_email'])) {
    header("Location: ../Account/login.php");
}

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
                <div class="col-lg-1">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-10 ">
                              <h3 class="m-t-none m-b">Leave Application </h3>
                                <form role="form" method="POST">
                                    <div class="form-group"><strong>
                                    <label>Prison Name</label></strong>
                                    <input type="text" class="form-control" name="pname" id="pname" size="77" value="" placeholder="Enter Username">
									</div>
									<div class="form-group"><strong>
                                    <label>Reason</label></strong>
                                    <select class="form-control" id="cmdreason" name="cmdreason" required>
                                                    <option value="">Select Reason</option>
                                                    <option value="Sick Leave">Sick Leave</option>
                                                    <option value="Study Leave">Study Leave</option>
                                                    <option value="Monthly Leave">Monthly Leave</option>
                                                    <option value="Study Leave">Study Leave</option>
                                                    <option value="Maternity Leave">Maternity Leave</option>

                                                    </select>                                   
                                                 </div>
											<div>
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
									
									 
									
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnapply"><strong>Apply</strong></button>
                                    </div>
                                </form>
                            </div>
							
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
			
                <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
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
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
					 <table width="85%" align="center" class="table table-bordered table-striped" id="example1">
                    <thead>
                    <th ><div align="center"><span class="style1">#</span></div></th>
					<th><div align="center"><span class="style1">prison Name</span></div></th>
              <th><div align="center"><span class="style1">prison Type</span></div></th>
              <th><div align="center"><span class="style1">State</span></div></th>
              <th><div align="center"><span class="style1">Zone</span></div></th>
              <th><div align="center"><span class="style1">City</span></div></th>
              <th><div align="center"><span class="style1">Action</span></div></th>
                    </thead>
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
            </div>
            </div>
        </div>
            </div>
            <div class="row"></div>
        </div>
		
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php include('../inc/footer.php');  ?></div>
        </div>

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
