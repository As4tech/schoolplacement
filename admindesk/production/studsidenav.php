<div class="left_col scroll-view">
                    

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
						<?php  
								   require("connect.php");
								   $schools=mysqli_query($conn,"SELECT * FROM schoolinfo where schoolname='$scl'");
								   $schlarray=mysqli_fetch_array($schools);
						?>
                            <?php echo"<img src='logo/$schlarray[schoollogo]' class='img-circle profile_img'>"?>
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $studarray['studname'] ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                  
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="studpotal.php?id=<?php echo urlencode(encript($sind))?> && schl=<?php echo urlencode(encript($scl))?>"><i class="fa fa-home" style="font-size:30px;color:mediumseagreen"></i> HOME <span ></span></a>
                  </ul>
				<!--<ul class="nav side-menu">
                  <li><a><i class="fa fa-download" style="font-size:24px;color:blue"></i> DOWNLOAD ITEMS<span class="fa fa-chevron-down"></span></a>
                  				 
				 <?php 
                   //if($studarray['admstatus']>='1'){?>
                    <ul class="nav child_menu">
                    <li><a href="recordsform.php?id=<?php echo urlencode(encript($sind))?> && schl=<?php echo urlencode(encript($scl))?>">Personal Record Form</a></li>
                    <li><a href="admision.php">Admission</a></li>
                    <li><a href="prospectus.php">Prospectus</a></li>
                  </ul>
                 <?php //}else{
                  ?>
                  
                  
                  <?php
                 //}
                  ?>
                  
                  </li>
                  
                </ul>!-->
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                                
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
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