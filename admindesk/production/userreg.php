<?php
require("secured.php");
?>
<!DOCTYPE html>
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
				require("formtopnav.php");
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
                                    <form class="" action="" method="post" novalidate>
                                      <?php 
										if(isset($_POST['submit']))
										{
                                        require("connect.php");
                                        require("encryption.php");
										$schlname=mysqli_real_escape_string($conn,$_POST['schlname']);
										$schlcode=mysqli_real_escape_string($conn,$_POST['schlcode']);
										$fname=mysqli_real_escape_string($conn,$_POST['fname']);
										$telephone=mysqli_real_escape_string($conn,$_POST['phone']);
										$username=mysqli_real_escape_string($conn,$_POST['uname']);
										$accesslevel=mysqli_real_escape_string($conn,$_POST['alevel']);
                                        $plaintext = mysqli_real_escape_string($conn,$_POST['password']);
                                        $pass = encript($plaintext);

                                        $tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
										//$pass=mysqli_real_escape_string($conn,openssl_encrypt($_POST['password'],"AES-256-CBC","hello",0,"1234567890123456"));
										
										
										$users=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND phone='$telephone'")or die(mysqli_error($conn));
										$countusers=mysqli_num_rows($users);
										if($countusers==1)
										{
                                            echo
                                            "
                                            <button class='btn btn-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>User Already Registered</button>
                                            ";	
										}
										ELSE
										{
										$insertuser=mysqli_query($conn,"INSERT INTO users(schoolname,schoolcode,fullname,phone,username,ulevel,upassword,tdate)
										VALUES('$schlname','$schlcode','$fname','$telephone','$username','$accesslevel','$pass','$tdate')")or die(mysqli_error($conn));
										if($insertuser)
										{
                                            echo
                                            "
                                            <button class='btn btn-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>User Successfully Registered</button>
                                            ";	
										}
										}
										}
										?>
                                        <span class="section">Personal Info</span>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">School Name</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="schlname" class="form-control">
												<option></option>
												<?php
												require("connect.php");
												$level=mysqli_query($conn,"SELECT * FROM schoolinfo");
												WHILE($levelarray=mysqli_fetch_array($level))
												{
													echo
													"
													<option required>$levelarray[schoolname]</option>
													";
												}
												?>
													
													
												</select>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">School Code<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="" data-validate-words="" name="schlcode" placeholder="Enter School code" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Full Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="" data-validate-words="" name="fname" placeholder="Enter Full Name" required="required" />
                                            </div>
                                        </div>
                                        
										
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="10,20" /></div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">User Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control"  name="uname" placeholder="Enter User Name" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align ">Access Level</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="alevel" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
												$level=mysqli_query($conn,"SELECT * FROM accesslevel");
												WHILE($levelarray=mysqli_fetch_array($level))
												{
													echo
													"
													<option required>$levelarray[levelname]</option>
													";
												}
												?>
													
													
												</select>
											</div>
										</div>
										 <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="password" id="password1" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,16}" required />
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" name="cpassword" data-validate-linked='password' required='required' /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="tdate" required='required'></div>
                                        </div>
                              
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-success">Submit</button>
                                                    <a href="userview.php" type='reset' class="btn btn-primary">View</a>
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

