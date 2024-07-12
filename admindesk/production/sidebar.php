
			
			<div class="left_col scroll-view">
				
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
			  <?PHP  
			  require("connect.php");
			  $schl=mysqli_query($conn,"SELECT * FROM schoolinfo WHERE schoolname='$_SESSION[schlname]'");
			  $schlarray=mysqli_fetch_array($schl);
			  ?>
                <img src="logo/<?php echo $schlarray['schoollogo'] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
			   <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div  class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home" style="font-size:30px;color:mediumseagreen"></i> HOME <span class=""></span></a>
                   
                  </li>
				 
                  <li><a><i class="fa fa-laptop" style="color:orange;font-size:24px"></i>REGISTRATION<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="schlreg.php">School Registration</a></li>
                      <li><a href="studreg.php">Upload Enrollement</a></li>
                      <li><a href="enrolstudent.php">Enroll Student</a></li>
                      
                    </ul>
                  </li>
				  <li><a><i class="fa fa-book" style="color:dodgerblue;font-size: 22px;"></i>REPORTS<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viewschools.php">List of Schools</a></li>
                      <li><a href="viewadmissionlist.php">Admission List</a></li>
                      <li><a href="viewenrollment.php">Enrollement List</a></li>
                      <!--<li><a href="vregions.php">List of Regions</a></li>!-->
                      <li><a href="vdistricts.php">List of Districts</a></li>
                      <li><a href="vaccess.php">List of Access</a></li>
                      <li><a href="vusers.php">Users List</a></li>
                      
                    </ul>
                  </li>
				  <li><a><i class="fa fa-gear" style="font-size:24px;color:rgb(255,0,0)"></i>CONFIGURATION<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="access.php">Add Access</a></li>
                      <li><a href="userreg.php">Add User</a></li>
					  <li><a href="programs.php">Upload Programs</a></li>
                      <li><a href="regprogram.php">Add Program</a></li>
                      <li><a href="houses.php">House Registration</a></li>
                      <li><a href="composeletter.php">Compose Admission</a></li>
                      <li><a href="uploadprospect.php">Upload Prospectus</a></li>
                      <li><a href="accepatance.php">Upload Letter of Acceptance</a></li>
                      <li><a href="regdist.php"> Region&District Registration</a></li>
                      <li><a href="distreg.php">Region&District Upload</a></li>
                      
                      
                    </ul>
                  </li>
				
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>