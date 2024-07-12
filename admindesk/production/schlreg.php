<?php 
require("secured.php");
?>
<html lang="en">

<head>
    <?php 
	require("formhead.php");
	?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
						<?php 
						require("sidebar.php");
						?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <?php 
					require("footerbuttons.php");
					?>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
				<?php 
				require("topnav.php");
				?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form class="" enctype="multipart/form-data" action="" method="post" novalidate>
									<?php 
									if(isset($_POST['submit']))
									{
                                        require("connect.php");
										$schlname=mysqli_real_escape_string($conn,$_POST['schlfullname']);
										$abreviatname=mysqli_real_escape_string($conn,$_POST['schlabreviate']);
										$schlcode=mysqli_real_escape_string($conn,$_POST['schlcode']);
										$picname=$_FILES['pic']['name'];
										$location="logo/";
										move_uploaded_file($_FILES['pic']['tmp_name'],"$location".$picname);
										$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
										$schools=mysqli_query($conn,"SELECT * FROM schoolinfo WHERE schoolname='$schlname' AND schlcode='$schlcode'")or die(mysqli_error($conn));
										
										$countschools=mysqli_num_rows($schools);
										if($countschools==1)
										{
                                            echo
                                                '
                                                
                                                <div class="alert alert-danger alert-dismissible " role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 style="font-weight:bold;text-align:center"><strong>Sorry!</strong> School Already Registered.</h4>
                                                </div>
                                                ';	
										}
										ELSE
										{
											$insertschl=mysqli_query($conn,"INSERT INTO schoolinfo(schoolname,abreviatedname,schlcode,schoollogo,tdate)
											VALUES('$schlname','$abreviatname','$schlcode','$picname','$tdate')");
											if($insertschl)
											{
                                                echo
                                                '
                                                
                                                <div class="alert alert-success alert-dismissible " role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 style="font-weight:bold;text-align:center"><strong>Congratulations!</strong> School Successfullly Registered.</h4>
                                                </div>
                                                ';	
											}
										}
									}
									?>
                                       
                                        <span class="section">School Info</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">School Full Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="schlfullname" placeholder="" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">School Abreviation<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="schlabreviate" data-validate-length-range="3,15" type="text" required="required"/></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">School Code<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="schlcode" data-validate-length-range="5,15" type="text" required="required"/></div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">School Logo<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="file" name="pic" class='optional' required="required"/></div>
                                        </div>
										
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="tdate" required='required'></div>
                                        </div>
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name='submit' class="btn btn-success">Submit</button>
                                                    <a href="vschl.php" type='reset' class="btn btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
