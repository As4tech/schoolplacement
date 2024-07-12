<?php 
require("session.php");
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
				echo
      "
      <button class='alert alert-danger' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Select an excel file to import.</button>
      ";	
			}
			else
			{	
			$handle = fopen($file, "r");
			//fgetcsv($handle);
	
    if ($file == NULL) {
      echo
      "
      <button class='alert alert-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>Select an excel file to import.</button>
      ";	
	  }

    else {
		$callow=8;
    $exist=0;
    $insert=0;
      while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
          $cols= count($filesop);
          if($cols!=$callow){
           
          }else{
            @$c0 = mysqli_real_escape_string($conn,$filesop[0]);
            @$c1 = mysqli_real_escape_string($conn,$filesop[1]);
            @$c2 = mysqli_real_escape_string($conn,$filesop[2]);
            @$c3 = mysqli_real_escape_string($conn,$filesop[3]);
            @$c4 = mysqli_real_escape_string($conn,$filesop[4]);
            @$c5 = mysqli_real_escape_string($conn,$filesop[5]);
            @$c6 = mysqli_real_escape_string($conn,$filesop[6]);
            @$c7=  mysqli_real_escape_string($conn,$filesop[7]);
          
            $students=mysqli_query($conn,"SELECT * FROM students where studentindex='$c0' AND schlname='$schlname'")or die(mysqli_error($conn));
            $countstudents=mysqli_num_rows($students);
            if($countstudents == 1)
            {
              $exist++;
              
            }
            else
            {
              $insertmem=mysqli_query($conn,"insert into students(studentindex,studname,gender,aaggregate,programme,track,sstatus,house,schlname,tdate)
              VALUES('$c0','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$schlname','$tdate')")or die(mysqli_error($conn));
            if($insertmem)
            {
              
              $insert++;
            }	
          }
          }
       // $counter=$count++;
		   //$tdate=date('Y-m-d');
		  //echo $c0."<br>";
		
			
    
    			
		}


    if($exist>1)
    {
      echo
      '
    <div class="alert alert-danger alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <h4 style="font-weight:bold;text-align:center">'.$exist.' Records Repeated.</h4>
    </div>
     ';	
    }
    
    if($insert>1)
    {
      
      echo
      '
      <div class="alert alert-success alert-dismissible " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <h4 style="font-weight:bold;text-align:center">'.$insert.' records uploadded.</h4>
    </div>
      ';	
    }
		}
		}
  }
	?>
			
				  <span class="section">Upload Students</span>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Stundents Info<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6" style="font-weight:bold">
                        <input type="file" name="file" class="form-control"
                          placeholder="" required="required" />
                      </div>
                    </div>
					<div class="field item form-group">
					<label class="control-label col-md-3 col-sm-3 label-align" class="required">School Name</label>
					<div class="col-md-6 col-sm-6 ">
						<select name="schlname" class="form-control">
						<option></option>
						<?php
						require("connect.php");
            if($_SESSION['level']=="Admin"){
              $level=mysqli_query($conn,"SELECT * FROM schoolinfo where schoolname='$_SESSION[schlname]'");
						WHILE($levelarray=mysqli_fetch_array($level))
						{
							echo
							"
							<option required>$levelarray[schoolname]</option>
							";
						}
            }else{
              $level=mysqli_query($conn,"SELECT * FROM schoolinfo");
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
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" class='date' type="date" name="tdate" required='required'></div>
                    </div>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-success" name="submit">Submit</button>
                    <a href='venrol.php' class="btn btn-primary">View</a>
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