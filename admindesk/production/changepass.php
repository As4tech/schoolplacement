<?php
require("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	require("formhead.php");
	?>
    <script>
        function showUser(str) {
        if (str==""){
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
        xmlhttp.open("GET","newpass.php?pass="+str,true);
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
                    
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php 
                    if($_SESSION["level"]=="Super Admin"){
                        require("sidebar.php");
                    }else{
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
										if(isset($_POST['submit']))
										{
                                        require("connect.php");
                                        require("encryption.php");
										@$npass=mysqli_real_escape_string($conn,($_POST['password']));
                                            $new=encript($npass);
                                             $updateuser=mysqli_query($conn,"update users set upassword='$new' where username='$_SESSION[username]'");
                                            if($updateuser){
                                                echo
                                            "
                                            <button class='btn btn-success' style='font-weight:bold;pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>$_SESSION[fname],Your Password Successfully Changed.</button>
                                            ";	
                                            }
										}
										?>
                                        <span class="section">Change Password</span>
										
                                         <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">Old Password<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" autocomplete="off" oninput="showUser(this.value)" type="password" id="" name="pass" pattern="" required />
												
												
											</div>
										</div>
                                        <p id="txtHint"></p>
                                    
                                        
                                       
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

