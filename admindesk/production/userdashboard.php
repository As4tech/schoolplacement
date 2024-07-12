<?php 
require("session.php");
?>
<html lang="en">
  <?php 
  require("homehead.php");
  ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php  
		  require("sidebartwo.php");
		  ?>
        </div>

        <!-- top navigation -->
		<?php 
		require("topnav.php");
		?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
          <div class="row" style="display: inline-block;">
            <div class="top_tiles">
            <?php 
            $date=date('Y-m-d');
            require("connect.php");
            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]'");
            $cenrol=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]' && gender='Male' && tdate='$date'");
            $tmenrol=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]' && gender='Female' && tdate='$date'");
            $tfenrol=mysqli_num_rows($enrol);


            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]' && tdate='$date'");
            $tenrol=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and tdate='$date' && schlname='$_SESSION[schlname]' ");
            $tcadm=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and gender='Male' AND tdate='$date' && schlname='$_SESSION[schlname]' ");
            $tmadm=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and gender='Female' AND tdate='$date' && schlname='$_SESSION[schlname]' ");
            $tfadm=mysqli_num_rows($enrol);


            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]' && gender='Male'");
            $menrol=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]' && gender='Female'");
            $fenrol=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and schlname='$_SESSION[schlname]'");
            $admstud=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and schlname='$_SESSION[schlname]' && gender='Male'");
            $madmision=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and gender='Female' && schlname='$_SESSION[schlname]'");
            $fadmision=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and sstatus='Boarding' && schlname='$_SESSION[schlname]'");
            $badmision=mysqli_num_rows($enrol);

            $enrol=mysqli_query($conn,"select * from students where admstatus='1' and schlname='$_SESSION[schlname]' && sstatus='Day'");
            $dadmision=mysqli_num_rows($enrol);
            ?>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-fast-forward" style="color:red"></i></div>
                  <div class="count"><?php echo $cenrol ?></div>
                 <h2>Total Enrolled Students</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-male" style="color:yellow"></i></div>
                  <div class="count"><?php echo $menrol  ?></div>
                  <h2>Total Male Enrollment</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-female" style="color:yellow"></i></div>
                  <div class="count"><?php echo $fenrol ?></div>
                  <h2>Total Female Enrollment</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-thumbs-up" style="color:blue"></i></div>
                  <div class="count"><?php echo $admstud ?></div>
                  <h2>Total Admitted Students</h2>
                </div>
              </div>
              
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-male" style="color:green"></i></div>
                  <div class="count"><?php echo $madmision ?></div>
                  <h2>Male Admitted Students</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-female" style="color:green"></i></div>
                  <div class="count"><?php echo $fadmision ?></div>
                  <h2>Female Admitted Students</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-university" style="color:pink"></i></div>
                  <div class="count"><?php echo $badmision ?></div>
                  <h2>Boarding Admitted Students</h2>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-external-link" style="color:red"></i></div>
                  <div class="count"><?php echo $dadmision ?></div>
                  <h2>Day Admitted Students</h2>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container" style="height:280px">
                        <div id="chart_plot_03" class="demo-placeholder"></div>
                      </div>
                

                    </div>

                    <div class="col-md-3 col-sm-12 ">
                      <div>
                        <div class="x_title">
                          <h2>Today Activities</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                        <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Total Admitted</a>
                              <p><strong><?php echo $tcadm ?></strong></p>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Male Admitted</a>
                             <p> <strong><?php echo $tmadm ?></strong></p>
                              
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Female Admitted</a>
                             <p> <strong><?php echo $tfadm ?></strong></p>
                            </div>
                          </li>

                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Total Enrollment</a>
                             <p> <strong><?php echo $tenrol ?></strong></p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Male Enrolled</a>
                             <p> <strong><?php echo $tmenrol ?></strong></p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Female Enrolled</a>
                             <p> <strong><?php echo $tfenrol ?></strong></p>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php 
		  require("indexfoot.php");
		  ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
