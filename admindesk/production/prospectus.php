<?php 
require("studsecret.php");
?>
	<?php
	require("connect.php");
	$stud=mysqli_query($conn,"SELECT * FROM students where studentindex='$_SESSION[indexnum]'");
	$studarray=mysqli_fetch_array($stud);
	?>
<html lang="en">

<head>
    <?php 
	require("homehead.php");
	?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <?php  
				require("studsidenav.php");
				?>
            </div>

            <!-- top navigation -->
            <?php 
			require("studformtop.php");
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

                                <table id="datatable-buttons" cellspacing="0" class="table table-striped table-bordered" style="width:100%">
                    
					  <tbody>
				<div class="ln_solid">
                <div class="form-group" style="margin-left:268px">
                    <?php  
                        require("connect.php");
                        $admis=mysqli_query($conn,"select * from prospectus where schoolname='$_SESSION[schlname]'");
                        while($showadmis=mysqli_fetch_array($admis))
                        {
                            echo"<tr cell>";
                            echo'<td><h2 style="font-weight:bold">Click on the Button to Download your Prospectus</h2>
                            <a class="btn btn-success" href="prospect/'.$showadmis['prospectus'].'" download>Download</a></td>';
                            echo"</tr>";
                        }
                        ?>    
                    </div>   
                </div>
                    </table>
                                    
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
