<style>
  #system-cover{
    width:100%;
    height:35em;
    object-fit:cover;
    object-position:center center;
  }
</style>

 <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
							
							  <h6 class="text-white">Prison List</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h5 class="m-b-0 m-t-5"><?php 
            $prison = $conn->query("SELECT * FROM prison_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($prison);
          ?>
          <?php ?></h5>
								 
                            </div>
                        </div>
                    </div>
					
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                 <h6 class="text-white">Cell Blockt</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h5 class="m-b-0 m-t-5">  <?php 
            $cells = $conn->query("SELECT id FROM cell_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($cells);
          ?>
          <?php ?></h5>
							
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                 <h6 class="text-white">Crimes</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                 <h5 class="text-white"><?php 
            $crimes = $conn->query("SELECT id FROM crime_list where  `status` =1 and delete_flag = 0")->num_rows;
            echo format_num($crimes);
          ?>
          <?php ?></h5>
							
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                  <h6 class="text-white">Actions</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h5 class="m-b-0 m-t-5">   <?php 
            $actions = $conn->query("SELECT id FROM action_list where `status` =1 and delete_flag = 0")->num_rows;
            echo format_num($actions);
          ?>
          <?php ?></h5>
							
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                  <h6 class="text-white">Currrent Inmates</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h5 class="m-b-0 m-t-5">  <?php 
            $inmates = $conn->query("SELECT id FROM inmate_list where `status` =1  and (date(date_to) > '".date('Y-m-d')."' or date_to is NULL )")->num_rows;
            echo format_num($inmates);
          ?>
          <?php ?></h5>
							
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
							<h6 class="text-white">Released Inmates</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                
								 <h5 class="m-b-0 m-t-5"> <?php 
            $inmates = $conn->query("SELECT id FROM inmate_list where date(date_to) <= '".date('Y-m-d')."'")->num_rows;
            echo format_num($inmates);
          ?>
          <?php ?></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
							<h6 class="text-white">Today's Visits</h6>
                                <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                <h5 class="text-white"><?php 
            $visits = $conn->query("SELECT id FROM visit_list where date(date_created) = '".date('Y-m-d')."'")->num_rows;
            echo format_num($visits);
          ?>
          <?php ?></h5>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                  
                    <!-- Column -->
                </div>

