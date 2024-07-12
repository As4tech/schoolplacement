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
        <?php 
		require("sidebar.php");
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
          
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                
                <div class="x_content" style="font-weight:bold">
                  <form class="" enctype="multipart/form-data" style="font-weight:bold" action="" method="post" enctype="multipart/form-data" novalidate>
				 <?php
                    if(isset($_POST['submit']))
					{
                       require("connect.php");
						$schlname=$_POST['schlname'];
						$pdf=$_FILES['pdf']['name'];
						$pdf_type=$_FILES['pdf']['type'];
						$pdf_size=$_FILES['pdf']['size'];
						$pdf_tem_loc=$_FILES['pdf']['tmp_name'];
						$pdf_store="aceptlet/".$pdf;
						move_uploaded_file($pdf_tem_loc,$pdf_store);
						$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
						
						$acceptlet=mysqli_query($conn,"SELECT * FROM acceptance where schlname='$schlname'")or die(mysqli_error($conn));
						$cadmisdoc=mysqli_num_rows($acceptlet);
						if($cadmisdoc==1)
						{
							echo
								"
								<button class='alert alert-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Acceptance Letter for $schlname Already Exist.</button>
								";	
						}else
						{
							$insertletter=mysqli_query($conn,"INSERT INTO acceptance(schlname,accletter,tdate)
							VALUES('$schlname','$pdf','$tdate')")or die(mysqli_error($conn));
							if($insertletter)
							{
								echo
								"
								<button class='alert alert-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Acceptance Letter for $schlname Successfully Uploaded.</button>
								";	
							}
						}
					}
					?>

			
				  <span class="section">Upload Acceptance Letter</span>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Acceptance Letter<span
                          class="required" color="red">*</span></label>
                      <div class="col-md-6 col-sm-6" style="font-weight:bold">
                        <input type="file" name="pdf" class="form-control"
                          placeholder="" required="required" />
                      </div>
                    </div>
					<div class="field item form-group">
					<label class="control-label col-md-3 col-sm-3 label-align">School Name</label>
					<div class="col-md-6 col-sm-6 ">
						<select name="schlname" class="form-control" required="required">
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
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" class='date' type="date" name="tdate" required='required'></div>
                    </div>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-success" name="submit">Submit</button>
                    <a href='vacceptlet.php' class="btn btn-primary">View</a>
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
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../vendors/validator/multifield.js"></script>
  <script src="../vendors/validator/validator.js"></script>

  <script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function (e) {
      var submit = true,
        validatorResult = validator.checkAll(this);
      console.log(validatorResult);
      return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function (e) {
      validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
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