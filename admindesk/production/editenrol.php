<?php
require("session.php");
require("connect.php");
require("encryption.php");
$ide=$_GET['id'];
$getid=decript($ide);
$scl=$_GET['scl'];
$schl=decript($scl);
$enrols=mysqli_query($conn,"select * from students where id='$getid'");
$enrolarray=mysqli_fetch_array($enrols);
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
                                    <form class="" action="" method="post" novalidate>
                                      <?php 
										if(isset($_POST["submit"]))
										{
										require("connect.php");
										$schlname=mysqli_real_escape_string($conn,$_POST['schlname']);
										$hse=mysqli_real_escape_string($conn,$_POST['hsename']);
										$studindex=mysqli_real_escape_string($conn,$_POST['indexnum']);
										$studname=mysqli_real_escape_string($conn,$_POST['studname']);
										$gender=mysqli_real_escape_string($conn,$_POST['gender']);
										$aggregate=mysqli_real_escape_string($conn,$_POST['aggregade']);
										$program=mysqli_real_escape_string($conn,$_POST['program']);
										$track=mysqli_real_escape_string($conn,$_POST['track']);
										$status=mysqli_real_escape_string($conn,$_POST['status']);
										$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
										$sa=mysqli_query($conn,"SELECT * FROM students where schlname='$schlname' and studentindex='$studindex'");
										$asa=mysqli_num_rows($sa);
										if($asa==1)
										   {
											$somerec=mysqli_query($conn,"UPDATE students SET studname='$studname',gender='$gender',aaggregate='$aggregate',programme='$program',track='$track',sstatus='$status',house='$hse',tdate='$tdate' where id='$getid'")or die(mysqli_error($conn));
											  if($somerec){
												echo"<script>
												alert('Some Records Updated');
												window.location='venrol.php';
												</script>";
											  }
												
										   }else
										   {
											$insertstud=mysqli_query($conn,"UPDATE students SET schlname='$schlname',studentindex='$studindex',studname='$studname',gender='$gender',aaggregate='$aggregate',programme='$program',track='$track',sstatus='$status',house='$hse',tdate='$tdate' where id='$getid'")or die(mysqli_error($conn));
										
											if($insertstud)
											{
												echo
												"
												<script>
												alert('Student Record Successfully Updated');
												window.location='venrol.php';
												</script>
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
												<option><?php echo $enrolarray['schlname']  ?></option>
												<?php
												require("connect.php");
												if($_SESSION['level']=="Admin"){
													$level=mysqli_query($conn,"SELECT * FROM schoolinfo where schoolname='$_SESSION[schlname]'");
													WHILE($levelarray=mysqli_fetch_array($level))
													{
														
													}
												}else{
													$level=mysqli_query($conn,"SELECT * FROM schoolinfo where sstat='0'");
													WHILE($levelarray=mysqli_fetch_array($level))
													{
														echo
														"
														<option required>$levelarray[schoolname]</option>
														";
													}
												}	
												?>	
												</select>
											</div>
										</div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">House Name</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="hsename" class="form-control">
												<option><?php echo $enrolarray['house']  ?></option>
												<?php
												require("connect.php");
												if($_SESSION['level']=="Admin"){
													$hse=mysqli_query($conn,"SELECT * FROM houses where schlname='$_SESSION[schlname]'");
													WHILE($hsearay=mysqli_fetch_array($hse))
													{
														echo
														"
														<option required>$hsearay[hsename]</option>
														";
													}
												}
												else{
													$hse=mysqli_query($conn,"SELECT * FROM houses");
													WHILE($hsearay=mysqli_fetch_array($hse))
													{
														echo
														"
														<option required>$hsearay[hsename]</option>
														";
													}
												}	
												?>	
												</select>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Index Number<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="10" data-validate-words="" value="<?php echo $enrolarray['studentindex'] ?>"  name="indexnum" placeholder="BECE Index Number" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Student Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="" value="<?php echo $enrolarray['studname'] ?>" data-validate-words="2" name="studname" placeholder="Enter Full Name" required="required" />
                                            </div>
                                        </div>
										
                                         <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="gender" class="form-control">
												<option><?php echo $enrolarray['gender'] ?></option>
												<option>Male</option>
												<option>Female</option>
												</select>
											</div>
										</div>
										<div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Aggregate<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" value=<?php echo $enrolarray['aaggregate'] ?> min="6" onkeydown="return false" max="54"  name="aggregade" placeholder="Input Grade" required="required" />
                                            </div>
                                        </div>
										<div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Programme</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="program" class="form-control">
												<option><?php echo $enrolarray['programme'] ?></option>
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
												<select name="track" class="form-control">
												<option><?php echo $enrolarray['track'] ?></option>
												<option>SINGLE</option>
												<option>DOUBLE</option>
												</select>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
											<label class="control-label col-md-3 col-sm-3 label-align">Select Status</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="status" class="form-control">
												<option><?php echo $enrolarray['sstatus'] ?></option>
												<option>Boarding</option>
												<option>Day</option>
												</select>
											</div>
										</div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' value="<?php echo $enrolarray['tdate'] ?>" type="date" name="tdate" required='required'></div>
                                        </div>
                              
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-success">Update</button>
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
