<?php
require("session.php");
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
                   
                    <!-- menu profile quick info -->
                    
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php 
					require("connect.php");
			$level=mysqli_query($conn,"select * from accesslevel");
			if($_SESSION['level']=="Super Admin")
			{
			require("sidebar.php");
			}else
			{
				require("sidebartwo.php");
			}
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
									<?php
									if($_SESSION['level']=="Super Admin")
									{
										?>
										<form class="" action="" method="post" novalidate>
                                      <?php 
										if(isset($_POST['submit']))
										{
										require("connect.php");
										$schlname=mysqli_real_escape_string($conn,$_POST['schlname']);
										$hsename=mysqli_real_escape_string($conn,$_POST['hse']);
										$studindex=mysqli_real_escape_string($conn,$_POST['indexnum']);
										$studname=mysqli_real_escape_string($conn,$_POST['studname']);
										$gender=mysqli_real_escape_string($conn,$_POST['gender']);
										$aggregate=mysqli_real_escape_string($conn,$_POST['aggregade']);
										$program=mysqli_real_escape_string($conn,$_POST['program']);
										$track=mysqli_real_escape_string($conn,$_POST['track']);
										$status=mysqli_real_escape_string($conn,$_POST['status']);
										$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
										
										$students=mysqli_query($conn,"SELECT * FROM students WHERE schlname='$schlname' AND studentindex='$studindex'")or die(mysqli_error($conn));
										$countstudents=mysqli_num_rows($students);
										if($countstudents==1)
										{
											echo
											"
											<button class='btn btn-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Student with Index $studindex Already Enrolled in Your School.</button>
											";
										}
										ELSE
										{
										$insertstud=mysqli_query($conn,"INSERT INTO students(schlname,house,studentindex,studname,gender,aaggregate,programme,track,sstatus,tdate)
										VALUES('$schlname','$hsename','$studindex','$studname','$gender','$aggregate','$program','$track','$status','$tdate')")or die(mysqli_error($conn));
										if($insertstud)
										{
											echo
											"
											<button class='btn btn-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Student Successfully Enrolled</button>
											";
										}
										}
										}
										?>
                                        <span class="section">Personal Info</span>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">School Name</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="schlname" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
													$level=mysqli_query($conn,"SELECT * FROM schoolinfo where sstat='0'");
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
											<label class="control-label col-md-3 col-sm-3 label-align">House Name</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="hse" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
													$hse=mysqli_query($conn,"SELECT * FROM houses");
													WHILE($hsearray=mysqli_fetch_array($hse))
													{
														echo
														"
														<option required>$hsearray[hsename]</option>
														";
													}
												?>	
												</select>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Index Number<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="number" class="form-control" data-validate-length-range="10" data-validate-words=""  name="indexnum" placeholder="BECE Index Number" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Student Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="" data-validate-words="2" name="studname" placeholder="Enter Full Name" required="required" />
                                            </div>
                                        </div>
										
                                         <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="gender" class="form-control" required="required">
												<option></option>
												<option>Male</option>
												<option>Female</option>
												</select>
											</div>
										</div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Aggregate<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" min="6" onkeydown="return false" max="54"  name="aggregade" placeholder="Input Grade" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Programme</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="program" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
												$program=mysqli_query($conn,"SELECT * FROM programmes");
												WHILE($programarray=mysqli_fetch_array($program))
												{
													echo
													"
													<option class='required'>$programarray[program]</option>
													";
												}
												?>
													
													
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Track</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="track" class="form-control" required="required">
												<option></option>
												<option>SINGLE</option>
												<option>DOUBLE</option>
												</select>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Status</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="status" class="form-control" required="required">
												<option></option>
												<option>Boarding</option>
												<option>Day</option>
												</select>
											</div>
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
                                                    <a href='venrol.php' type='reset' class="btn btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
										<?php
									}
									else
									{
										?>
										<form class="" action="" method="post" novalidate>
                                      <?php 
										if(isset($_POST['submit']))
										{
										require("connect.php");
										$hsename=mysqli_real_escape_string($conn,$_POST['hse']);
										$studindex=mysqli_real_escape_string($conn,$_POST['indexnum']);
										$studname=mysqli_real_escape_string($conn,$_POST['studname']);
										$gender=mysqli_real_escape_string($conn,$_POST['gender']);
										$aggregate=mysqli_real_escape_string($conn,$_POST['aggregade']);
										$program=mysqli_real_escape_string($conn,$_POST['program']);
										$track=mysqli_real_escape_string($conn,$_POST['track']);
										$status=mysqli_real_escape_string($conn,$_POST['status']);
										$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
										
										$students=mysqli_query($conn,"SELECT * FROM students WHERE schlname='$_SESSION[schlname]' AND studentindex='$studindex'")or die(mysqli_error($conn));
										$countstudents=mysqli_num_rows($students);
										if($countstudents==1)
										{
											echo
											"
											<button class='btn btn-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Student with Index $studindex Already Enrolled in Your School.</button>
											";
										}
										ELSE
										{
										$insertstud=mysqli_query($conn,"INSERT INTO students(schlname,house,studentindex,studname,gender,aaggregate,programme,track,sstatus,tdate)VALUES('$_SESSION[schlname]','$hsename','$studindex','$studname','$gender','$aggregate','$program','$track','$status','$tdate')")or die(mysqli_error($conn));
										if($insertstud)
										{
											echo
											"
											<button class='btn btn-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Student Successfully Enrolled</button>
											";
										}
										}
										}
										?>
                                        <span class="section">Personal Info</span>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">House Name</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="hse" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
													$hse=mysqli_query($conn,"SELECT * FROM houses where schlname='$_SESSION[schlname]'");
													WHILE($hsearray=mysqli_fetch_array($hse))
													{
														echo
														"
														<option required>$hsearray[hsename]</option>
														";
													}
												?>	
												</select>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Index Number<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" data-validate-length-range="10" data-validate-words=""  name="indexnum" placeholder="BECE Index Number" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Student Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="" data-validate-words="2" name="studname" placeholder="Enter Full Name" required="required" />
                                            </div>
                                        </div>
										
                                         <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="gender" class="form-control" required="required">
												<option></option>
												<option>Male</option>
												<option>Female</option>
												</select>
											</div>
										</div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Aggregate<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" min="6" onkeydown="return false" max="54"  name="aggregade" placeholder="Input Grade" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Programme</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="program" class="form-control" required="required">
												<option></option>
												<?php
												require("connect.php");
												$program=mysqli_query($conn,"SELECT * FROM programmes");
												WHILE($programarray=mysqli_fetch_array($program))
												{
													echo
													"
													<option class='required'>$programarray[program]</option>
													";
												}
												?>
													
													
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Track</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="track" class="form-control" required="required">
												<option></option>
												<option>SINGLE</option>
												<option>DOUBLE</option>
												</select>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Status</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="status" class="form-control" required="required">
												<option></option>
												<option>Boarding</option>
												<option>Day</option>
												</select>
											</div>
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
                                                    <a href='venrol.php' type='reset' class="btn btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
										<?php
									}
									?>
                                    
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
