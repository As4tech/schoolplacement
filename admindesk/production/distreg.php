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

                  <form class="" style="font-weight:bold" action="" method="post" enctype="multipart/form-data" novalidate>
				 <?php
                    if(isset($_POST['submit']))
					{
						require("connect.php");
						$file=mysqli_real_escape_string($conn,$_FILES['file']['tmp_name']);						
						$filetype=mysqli_real_escape_string($conn,$_FILES['file']['name']);
						$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
						$ext = pathinfo($filetype, PATHINFO_EXTENSION);
			
			if($ext!="csv")
			{
				echo
      "
      <button class='btn btn-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Select an Excel File to Import</button>
      ";	
			}
			else
			{	
			$handle = fopen($file, "r");
			fgetcsv($handle);

      if ($file == NULL) {
        echo
        "
        <button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Select an excel file to import.</button>
        ";	
	  }

    else {
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
        @$c0 = $filesop[0];
        @$c1 = $filesop[1];
		//$tdate=date('Y-m-d');
		//echo $c0."<br>";
			$district=mysqli_query($conn,"SELECT * FROM districts where region='$c0' AND district='$c1'")or die(mysqli_error($conn));
			$cdistrict=mysqli_num_rows($district);
			if($cdistrict == 1)
			{
				echo
      "
      <button class='btn btn-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Region And District Already Exist.</button>
      ";	
			}
			ELSE
			{
				$insertdist=mysqli_query($conn,"insert into districts(region,district,tdate)
				VALUES('$c0','$c1','$tdate')")or die(mysqli_error($conn));
			if($insertdist)
			{
				echo
      "
      <button class='btn btn-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Districts And Districts Uploaded Successfully.</button>
      ";	
			}	
			}	
		}
				
		}
		}
		}
	?>
			
				  <span class="section">Upload Regions & Districts</span>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Stundents Info<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6" style="font-weight:bold">
                        <input type="file" name="file" class="form-control"
                          placeholder="" required="required" />
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
                    <a href='vdistricts.php' class="btn btn-primary">View</a>
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
         <?php 
        require("indexfoot.php");
         ?>
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