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
                
                <div class="x_content" style="font-weight:bold">
                  <form class="" style="font-weight:bold" action="" method="post" enctype="multipart/form-data" novalidate>
				 <?php
                    if(isset($_POST['submit']))
					{
						require("connect.php");
						$file=$_FILES['file']['tmp_name'];						
						$filetype=$_FILES['file']['name'];
						$tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
						$schlname=mysqli_real_escape_string($conn,$_POST['schlname']);
						$ext = pathinfo($filetype, PATHINFO_EXTENSION);
			
			if($ext!="csv")
			{
				echo"<script>
				alert('select an excel file');
				window.location='programs.php';
				</script>
				";
			}
			else
			{	
			$handle = fopen($file, "r");
			fgetcsv($handle);
	
    if ($file == NULL) {
      echo"<script>
	  alert('select a file to import');
	  window.location='studreg.php';
	  </script>";
	  }

    else {
		$count=0;
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
          $counter=$count++;
		  
        @$c0 = $filesop[0];
		//$tdate=date('Y-m-d');
		//echo $c0."<br>";
		if($count>0)
		{
			$students=mysqli_query($conn,"SELECT * FROM programmes where program='$c0'")or die(mysqli_error($conn));
			$countstudents=mysqli_num_rows($students);
			if($countstudents == 1)
			{
				echo
				"
				<script>
				alert('sorry Program Already exist');
				windo.location='programs.php';
				</script>
				";				
			}
			ELSE
			{
				$insertmem=mysqli_query($conn,"insert into programmes(program,tdate)
				VALUES('$c0','$tdate')")or die(mysqli_error($conn));
			if($insertmem)
			{
				echo"<script>
				alert('File uploaded Successfully');
				window.location='programs.php';
				</script>";
			}	
			}	
		}
				
		}
		}
		}
		}
	?>
			
				  <span class="section">Upload Programs</span>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Programs<span
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
                    <a href='vprogram.php' class="btn btn-primary">View</a>
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