  <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  
                  <span style="color:green;background-color:light-green; font-size:30px;" class="fa fa-user"></span ><b><?php echo $_SESSION['username'] ?></b>
                   
                </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="changepass.php"> Change Password</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class=""  aria-expanded="false">
                 
					 <strong  style='text-align:center;color:blue;font-family:verdana;font-size:30px;padding:0!important;margin-right:190px; text-transform:uppercase'><?php echo $_SESSION['schlname'] ?></strong>
       
          </a>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>