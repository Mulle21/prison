<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>

  <script>
    start_loader()
  </script>
  <style>
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
      backdrop-filter: contrast(1);
    }
    #page-title{
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
      background: #8080801c;
    }
  </style>
  
   <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="">
			 <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="assets/images/favicon.png" width="200"alt="logo" /></span>
                    </div></br>
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                    </div>
                    <!-- Form -->
                     <form id="login-frm" action="" method="post">
                        <div class="row p-b-50">
                            <div class="col-12">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" autocomplete="off" class="form-control form-control-lg" placeholder="Password"  name="password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
									<button type="submit" class="btn btn-lg btn-block btn-outline-success">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>

<script>
        $(function(){
            // Success Type
            $('#ts-success').on('click', function() {
                toastr.success('Ethio prsion system Login!', 'Admin');
            });

            // Success Type
            $('#ts-info').on('click', function() {
                toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort');
            });

            // Success Type
            $('#ts-warning').on('click', function() {
                toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');
            });

            // Success Type
            $('#ts-error').on('click', function() {
                toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
            });
        });
    </script>
<!-- jQuery -->

<!-- AdminLTE App -->


<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>