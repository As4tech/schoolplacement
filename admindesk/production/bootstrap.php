<?php
require("secured.php");
require("./model/model.php");
require("connect.php");
?>
<html lang="en">

<head>
    <?php 
	require("formhead.php");
	?>
    <style>
    .col{
        padding:1rem;
       
        border:2px solid #fff;
    }

    </style>
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
                            <form class="" id="updateform" enctype="multipart/form-data" action="" method="post" novalidate>

                            <span class="section">Personal Record Form </span>
                    <div class="row">
                                <div class="col-6">
                                <label class="input-label">School Name<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['schlname'];  ?>" name="sclname" id="sclname" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="form-label">Student Index Number<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['studentindex']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="input-label">Student Name<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['studname'];  ?>" name="sclname" id="sclname" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="form-label">Gender<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['gender']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="form-label">Track<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['track']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="input-label">Status<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['status'];  ?>" name="sclname" id="sclname" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="form-label">Aggregate<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['aggregate']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="form-label">Programme<span class="required">*</span></label>
                                    <input class="form-control" readonly value="<?php echo $studarray['programme']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
                                </div>
                                <div class="col-6">
                                <label class="input-label">Date of Birth<span class="required">*</span></label>
                                    <input class="form-control" class='date' value="<?php echo $studarray['dob'] ?>" type="date" id="dob" name="dob" required='required'>
                              </div>
                            <div class="col-6">
                                <label class="input-label">Religion *</label>
                                    <select name="religion" class="form-control" required>
                                    <option><?php echo $studarray['religion'] ?></option>
                                    <option>Christianity</option>
                                    <option>Islam</option>
                                    <option>Other</option>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label class="input-label">Enrollment Code<span class="required">*</span></label>
                                <input class="form-control" value="<?php echo $studarray['enrollcode'] ?>" type="text" id="password1" name="password" pattern="(?=.*[A-Z]).{6,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
                                    
                            </div>

                            <div class="col-6">
                                <label class="input-label">Confirm Enrollment Code<span class="required">*</span></label>
                                    <input class="form-control" type="text" value="<?php echo $studarray['enrollcode'] ?>" id="passwordtwo" name="password2" data-validate-linked='password' required='required' />
                            </div>
                            <div class="col-6">
                                <label class="input-label">Enrollment Code Page<span class="required">*</span></label>
                                    <span style="color:red;font-weight:bold">Please take a clear picture of the page that contains the Enrollment Code.You can also Update your Picture if the previewed Image does not Match Your details.</span>
                                <?php  
                                if($studarray['admstatus']==1){
                                echo" <img style='width:100%;height:350px' src='enrolcode_pic/$studarray[codepic]'>";
                                echo"<input class='form-control' type='file' value='' name='codepic' class='optional'/>";
                                echo"<input class='form-control' type='hidden' value='$studarray[codepic]' name='codepicold' class='optional' />";
                            
                                }
                                else{
                                    echo"<input class='form-control' type='file' value='' name='codepic' class='optional'/ required='required'>";
                                
                                }
                                ?></div>

                            <div class="col-6">
                                <label class="input-label">Junior High School Address<span class="required">*</span></label>
                                    <textarea class="form-control" required="required" id="jhsadress" name='jhsadress'><?php echo $studarray['jhsaddress'] ?></textarea>
                            </div>
                            <div class="col-6">
                            <label class="input-label">Region</label>
                                <select name="region" onchange="showUser(this.value)" id=""  class="form-control" required>
                                <option><?php echo $studarray['region'] ?></option>
                                <?php  
                                require("connect.php");
                                $regions=mysqli_query($conn,"SELECT * FROM regions");
                                WHILE($regarray=mysqli_fetch_array($regions))
                                {
                                    echo
                                    "
                                    <option>$regarray[region]</option>
                                    ";
                                }
                                
                                ?>
                                </select>
                            </div>
                            <p id="txtHint"></p>

                            <input type="hidden" class="form-control" name="districtold" id="pname" value="<?php echo $studarray['district'] ?>" placeholder=""/>
                            <div class="col-6">
                                <label class="input-label">Parent/Guardian Name<span class="required">*</span></label>
                                    <input class="form-control" name="pname" id="pname" value="<?php echo $studarray['pname'] ?>" placeholder="" required="required" />
                            
                            </div>


                            <div class="col-6">
                                <label class="input-label">Parent Contact<span class="required">*</span></label>
                                    <input class="form-control" type="tel" value="<?php echo $studarray['pcontact'] ?>" class='tel' id="pcontact" name="pcontact" required='required' data-validate-length-range="10,12" />
                            </div>
                            <div class="col-6">
                                <label class="input-label">Residential Address<span class="required">*</span></label>
                                    <textarea class="form-control" required="required" id="haddress" name='haddress'><?php echo $studarray['hseaddress'] ?></textarea>
                            </div>

                            <div class="col-6">
                                <label class="input-label">Date<span class="required">*</span></label>
                                    <input class="form-control" value="<?php echo $studarray['tdate'] ?>" class='date' type="date" id="tdate" name="tdate" required='required'>
                            </div>

                                
                    </div>
                           
                           
                            
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' id="submit" name="update" class="btn btn-success">Update</button>
                                    
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
	<script>
	let url="./controller/forms.php";
	$("#submit").on("click",(e)=>{
		e.preventDefault();
		let levelname=$("#level");
		let tdate=$("#tdate");
		let ttime=$("ttime");
		$.post(url,{levelname:levelname,tdate:tdate,ttime:ttime,submit:1},(res,code)=>{
		if(res=="2"){
		$("#success").show();
		$("#success").html('User Successfully Added');
	
		}	
		})
	})
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
	<!--<script>
	let url="../controller/forms.php";
	$("#submit").on("click",(e)=>{
		e.preventDefault();
		let acesslevel=$("#level").val();
		let tdate=     $("#tdate").val();
		let time =      $("#time").val();
		$.post(url,{acesslevel:acesslevel,tdate:tdate,time:time,submit:1},(res,code)=>{
			if(res=='hello'){
				echo "1";
			}
			
		})
	})
	
	</script>--!>


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
