<?php 
require("studsecret.php");
require("encryption.php");
?>
<?php
$ind=$_GET['id'];
$sind=decript($ind);
$cl=$_GET['schl']; 
$scl=decript($cl); 
require("connect.php");
?>
<html lang="en">
  <head>
 
	<!--<style>
      h1{
       width:100%;
       text-align:center;
       font-size:40px;
       margin-right:20px;
       
      } 
      
      .imgdiv{
        width:100%;
        
      }
      .conclude{
        width:40%;
        float:right;
        font-size:20px;
        font-family:times-new-roman;
        color:black;
      }
      
      .student{
        padding-top:120px;
        margin-right:350px;
        margin-left:20px;
        font-family:times-new-roman;
        font-size: 20px;
        color:black;
        
      }
      .firstparagraph{
        text-align:center;
        margin-right:20%;
      }
      p{
        padding-left:20px;
        font-size: 50px;
      }
      @media print{
        body {
    visibility:hidden;
  }
      #content {
        visibility:visible;
        position:fixed;
        left:0;
        top:0;
        width:100%;
        height:100%;
      }
  
        .letter{
            font-size:30px !important;
            margin:0;
            padding:0;
        }
        
      .firstparagraph{
        text-align:center;
        font-size:40px;
        margin-right:20%;
      }
      .conclude{
        width:50%;
        float:right;
        font-size:30px;
        font-family:times-new-roman;
        color:black;
      }
      
      .student{
        padding-top:150px;
        margin-right:350px;
        margin-left:30px;
        font-family:times-new-roman;
        font-size: 30px;
        color:black;
        
      }
    }

    </style>!-->
   <?php  
   require("homehead.php");
   ?>
   <script>
        function showUser(str) {
        if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
        } 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
            document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","district.php?region="+str,true);
        xmlhttp.send();
        }
    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
                <div class="clearfix"></div>

            <!-- menu profile quick info -->
            

            <!-- sidebar menu -->
                     <?php 
                        $stud=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND studentindex='$sind'");
                        $studarray=mysqli_fetch_array($stud);
                        $cadmitted=mysqli_num_rows($stud);
                        require("studsidenav.php");
                        ?>
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
        </div>

        <!-- top navigation -->
        <?php 
        require("studformtop.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color:green;font-weight:bold">Welcome to your Portal</h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
				  <p style="font-size:15px;color:red;font-weight:bold">Notice! Admission doesn't end here. Make sure to come along with your endorsed Placement Form with Photograph Attached to it.
				  Also do well to go through yourprospectus very well and make sure you come along with all required items.
				  Thank You and Looking Forward to see you.</p>
                    <h2>Student Profile </h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3 style="font-size:18px"><?php echo $studarray['studname'] ?></h3>
					  
						<?php 
						//require("");
						?>
                      <ul class="list-unstyled user_data">
                        <li><?php echo $studarray['jhsaddress'] ?></li>
                            <h3 style="font-size:18px"><?php echo $studarray['pname'] ?></h3>
                            <h3 style="font-size:18px"><?php echo $studarray['pcontact'] ?></h3>
                            <h3 style="font-size:18px"><?php echo $studarray['region'] ?></h3>
                            <h3 style="font-size:18px"><?php echo $studarray['district'] ?></h3>
                            <h3 style="font-size:18px"><?php echo $studarray['religion'] ?></h3>
                        <li>
                          <?php echo $studarray['hseaddress'] ?>
                        </li>

                       <br />

                      <!-- start skills -->
                      
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Student Report</h2>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
					 
                        <div style="padding:20p;">
                        <h2>INDEX NUMBER:<b style="margin-left:px;"><?php echo $studarray['studentindex'] ?></b></h2>
                        <h2>NAME:<b style="margin-left:90px;"><?php echo $studarray['studname'] ?></b></h2>
                        <h2>PROGRAM:<b style="margin-left:48px;"><?php echo $studarray['programme'] ?></b></h2>
                        <h2>STATUS:<b style="margin-left:74px;"><?php echo $studarray['sstatus'] ?></b></h2>
                        <h2>TRACK:<b style="margin-left:82px;"><?php echo $studarray['track'] ?></b></h2>
                        <h2>GENDER:<b style="margin-left:67px;"><?php echo $studarray['gender'] ?></b></h2>
                        <h2>AGGREGATE:<b style="margin-left:32px;"><?php echo $studarray['aaggregate'] ?></b></h2>
					         </div><br>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">ADMISSION</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">PROSPECTUS</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">LETTER OF ACCEPTANCE</a>
                          </li>
						              <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">PERSONAL RECORD FORM</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                           <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                
                        <td>Click on Proceed button to Print your Admission Letter. </td>
                         <td class="vertical-align-mid">
										         <a href="admision.php?id=<?php echo urlencode(encript($scl))?> && sindex=<?php echo urlencode(encript($sind))?>" class="btn btn-success" >Proceed</a>
                         </td>
                                </tr>
                                
                              </tbody>
                            </table>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                  <td>Click  the icon to download Prospectus. </td>
                                  <td class="vertical-align-mid">
                                      <?php  
                        require("connect.php");
                        $admis=mysqli_query($conn,"select * from prospectus where schoolname='$scl'");
                        while($showadmis=mysqli_fetch_array($admis))
                        {
                            echo'<td class="vertical-align-mid">
                            <a class="fa fa-download" href="prospect/'.$showadmis['prospectus'].'" download>Download</a></td>';
                            
                        }
                        ?>   
                                    
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
								require("connect.php");
								$acc=mysqli_query($conn,"select * from acceptance where schlname='$scl'");
								$cacc=mysqli_num_rows($acc);
								if($cacc==1)
								{
									?>
									 <td>Click  the icon to download Letter of Acceptance.</td>
                                  <td class="vertical-align-mid">
                                      <?php  
                        require("connect.php");
                        $accept=mysqli_query($conn,"select * from acceptance where schlname='$scl'");
                        while($showaccept=mysqli_fetch_array($accept))
                        {
                            echo'<td class="vertical-align-mid">
                            <a class="fa fa-download" href="aceptlet/'.$showaccept['accletter'].'" download>Download</a></td>';
                            
                        }
                        ?>   
									<?php
								}else
								{
									?>
									<td style="color:red">Sorr! Letter of Acceptance does not exist for your School.</td>
									<?php
								}
								?>
                                  
                                    
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
							  
                          </div>
						  <div role="tabpanel" class="tab-pane fade " id="tab_content4" aria-labelledby="tab">

                            <!-- start recent activity -->
                           <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                  <td>Click on the Proceed button to View and/or update your Personal Information. </td>
                                  <td class="vertical-align-mid">
                                  <a href="recordsform.php?id=<?php echo urlencode(encript($scl))?> && sindex=<?php echo urlencode(encript($sind))?>" class="btn btn-success" >Proceed</a>
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                            <!-- end recent activity -->

                          </div>
                        </div>
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
       <?php 
	   require("footer.php");
	   ?>
        <!-- /footer content -->
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>

	</script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>