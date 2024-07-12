           <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
						
                            <li class="nav-item dropdown open">
                               
							   <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                   <?php  
								   require("connect.php");
								   $schools=mysqli_query($conn,"SELECT * FROM schoolinfo where schoolname='$studarray[schlname]'");
								  // $schlarray=mysqli_fetch_array($schools);
								   ?>
								   <span style="color:green;background-color:light-green; font-size:30px;" class="fa fa-user"></span>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;">Profile</a>
                                    
                                    
                                <a class="dropdown-item" href="logoutstud.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
								
                            <li role="presentation" class="">
                                <a href="javascript:;"   data-toggle="dropdown" aria-expanded="false">
                                <i class=""></i>
                                <strong  style='text-align:center;color:blue;text-transform:uppercase;font-family:verdana;font-size:30px;padding:0!important;margin-right:190px;'><?php echo $studarray['schlname'] ?></strong>
                                </a>
                            
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>