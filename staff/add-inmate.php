
<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_staffID']))
    {   
      header("Location: ../Account/login.php"); 
    }  


if(isset($_POST["btncreate"]))
{
$IID = $_POST['IID'];
$iname = $_POST['iname'];
$idob = $_POST['idob'];
$isex = $_POST['isex'];
$iphone = $_POST['iphone'];
$iadress = $_POST['iadress'];
$bdate = $_POST['bdate'];
$sleavel = $_POST['sleavel'];
$redate = $_POST['redate'];
$history = $_POST['history'];
$cdate = $_POST['cdate'];



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
$location="../uploadImage/Profile/" . $_FILES["avatar"]["name"];

///check if username already exist
$stmt = $dbh->prepare("SELECT * FROM tblinmate WHERE IID=?");
$stmt->execute([$IID]);
$user = $stmt->fetch();

if ($user) {
$_SESSION['error'] ='Username Already Exist in our Database ';

} else {
 //Add User details
 $IID= 'STAFF/FKP/'.date("Y").'/'.rand(1000,5009); 
 $cdate= ''.date("m/d/Y"); 
$sql = 'INSERT INTO tblinmate(IID,iname,idob,isex,iphone,iadress,bdate,rdate,sleavel,redate,history,cdate,photo) VALUES(:IID,:iname,:idob,:isex,:iphone,:iadress,:bdate,:rdate,:sleavel,:redate,:history,:cdate,:photo)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':IID' => $IID,
	':iname' => $iname,
	':idob' => $idob,
	':isex' => $isex,
	':iphone' => $iphone,
	':iadress' => $iadress,	
	':bdate' => $bdate,
	':rdate' => $rdate,
	':sleavel' => $sleavel,
	':redate' => $redate,
	':history' => $history,
	':cdate' => $cdate,
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
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Leave Application| <?php echo $semail ;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $photo;?>">
</head>

<body>
 <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                           
                             </span>
  
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['sfullname'];  ?> </span> </span> </a>
                        
 
                 
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

<span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $rowaccess['sfullname'];  ?></span>
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
			
			
		   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create User </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
					<div class="col-lg-4 col-md-4 form-group mb-2">
                    <label for="exampleInputEmail1">Full Name </label>
                    <input type="text" class="form-control" name="iname" id="exampleInputEmail1" size="77" value="" placeholder="">
                  </div>
				  
				  <div class="col-lg-4 col-md-12 form-group mb-2">
                   
                    <label for="exampleInputEmail1">Date of Birth </label>
                    <input type="date" class="form-control" name="idob" id="dob" size="77" value="" placeholder="" required="" required="">
                 
				  </div>

                <div class="col-lg-4 col-md-12 form-group mb-2">
                    <label for="exampleInputEmail1">Gender </label>
					<select class="form-control" id="cmdreason" name="isex" required>
                                                    <option value="">--Select Gender --</option>
                                                    <option value="Sick Leave">Male</option>
                                                    <option value="Study Leave">Female</option>

                                                    </select> 
                    </div>
					 <div class="col-lg-4 col-md-12 form-group mb-2">
                    <label for="exampleInputEmail1">Address	 </label>
                    <input type="text" class="form-control" name="iadress" id="exampleInputEmail1" size="77" value="" placeholder="Enter Fullname">
                  </div>
				  
				  <div class="col-lg-4 col-md-12 form-group mb-2">
				   <label for="exampleInputEmail1">phone </label>
                    <input type="tel" class="form-control" name="iphone" id="txtphone" size="77" value="" placeholder="Enter Phone">
                  </div>
				  
				  
                  <div class="col-lg-4 col-md-12 form-group mb-2">
                    <label for="exampleInputPassword1">Booking Date</label>
                    <input type="date" class="form-control" name="bdate" id="exampleInputPassword1" size="77" value="" placeholder="Enter Password">
                  </div>
				  
				  <div class="col-lg-6 col-md-12 form-group mb-2">
                    <label for="exampleInputPassword1">Release Date</label>
                    <input type="date" class="form-control" name="redate" id="exampleInputPassword1" size="77" value="" placeholder="Enter Password">
                  </div>
				  
				  <div class="col-lg-6 col-md-12 form-group mb-2">
                    <label for="exampleInputPassword1">Security Level</label>
                    <input type="text" class="form-control" name="sleavel" id="exampleInputPassword1" size="77" value="" placeholder="Enter Password">
                  </div>
				  <div class="col-lg-8 col-md-12 form-group mb-4">
                    <label for="exampleInputPassword1">Disciplinary History</label>
					<textarea id="subject" name="history" placeholder="Write Disciplinary History.." style="height:200px"class="form-control"></textarea>
                   </div>
				      <div class="col-lg-4 col-md-12 form-group mb-4">
                    <label for="exampleInputPassword1">Image</label>
                    <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                       </p>

                    <p class="text-center">
                   <img src="../<?php echo $photo; ?>" alt="user image" width="178" height="154" id="logo-img">
				    </p>
              </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btncreate" class="btn btn-primary">Create User</button>
                </div> 
               


                <!-- /.card-body -->
 
              </form>
            </div>
			</div>
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
