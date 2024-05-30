<?php 
include('../inc/topbar.php'); 
if (empty($_SESSION['login_staffID'])) {
    header("Location: ../Account/login.php");
}

    if(isset($_POST["btnsubmit"])){
		$rdate= ''.date("m/d/Y"); 
		 $sql = 'INSERT INTO requst(rname,rcase,rgard,rdate) VALUES(:rname,:rcase,:rgard,:rdate)';
	$statement = $dbh->prepare($sql);
    $statement->execute([
	
	':rname' => $_POST['rname'],
	':rcase' => $_POST['rcase'],
    ':rgard' => $_POST['rgard'],
	':rdate' => $rdate
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
                <div class="col-lg-2">

                </div>
            </div>
			
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
									 <label>Inmate Name</label></strong>
						<select name="rname" id="group_id" class="form-control" required="">
						        <?php  
                          $sql2 = "SELECT * FROM tblinmate where id";
                          $result2 = $conn->query($sql2); 
                          while($row2= mysqli_fetch_array($result2)){
                        ?>
                        <option value=""><?php echo $row2['IID'];?></option>
                                             
                       
						
                      <?php } ?>
                                                   </select>
												   </div>
												 
												  
									<div class="col-sm-4 b-r">
                                    <label>Gard Name</label></strong>
                                    <input type="text" name="rcase" value="" placeholder="Enter Old Password" class="form-control" required="">
                                    </div>
									 <div class="col-sm-4 b-r">
                                    <label>Place</label></strong>
                                    <input type="text" name="rgard" value="" placeholder="Enter New Password" class="form-control" required="">
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
            
			
              
			<button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="btnsubmit" name="btnsubmit"><strong>Apply</strong></button>
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
