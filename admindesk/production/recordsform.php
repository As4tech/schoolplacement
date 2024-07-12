<?php 
require("studsecret.php");
require("encryption.php");
require("connect.php");
$ind=$_GET['sindex'];
$sind=decript($ind);
$cl=$_GET['id'];
$scl=decript($cl);
?>
<?php
	require("connect.php");
	
?>
<html lang="en">
<head>
    <?php 
	require("homehead.php");
	?>
        <script>
        function showUser(str) {
        if (str=="") {
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
        xmlhttp.open("GET","district.php?region="+str,true);
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

                   <br>

                    <!-- sidebar menu -->
					<?php 
                        $stud=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND studentindex='$sind'");
                        $studarray=mysqli_fetch_array($stud);
                        $cadmitted=mysqli_num_rows($stud);
					require("studsidenav.php");
					?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
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
      
     <?php
					if(isset($_POST['update']))
                    {
                        if(!empty($_POST['jhsadress']) and !empty($_POST['haddress']))
                        {
                        require("connect.php");
                        $dob=mysqli_real_escape_string($conn,$_POST['dob']);
                        $religion=mysqli_real_escape_string($conn,$_POST['religion']);
                        $enrolmentcode=mysqli_real_escape_string($conn,$_POST['password']);
                        $jhsadress=mysqli_real_escape_string($conn,$_POST['jhsadress']);
                        $region=mysqli_real_escape_string($conn,$_POST['region']);
                        $district=mysqli_real_escape_string($conn,$_POST['district']);
                        /*$distold=mysqli_real_escape_string($conn,$_POST['districtold']);
                        if($district!=''){
                            $districtnew=mysqli_real_escape_string($conn,$_POST['district']);
                        }
                        else
                        {
                           $districtnew=$distold;
                        }*/
                        $pname=mysqli_real_escape_string($conn,$_POST['pname']);
                        $pcontact=mysqli_real_escape_string($conn,$_POST['pcontact']);
                        $residentaddress=mysqli_real_escape_string($conn,$_POST['haddress']);
                        $tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
                        $rdate=date('Y-m-d');
                        $enrolcodepic=$_SESSION['indexnum'].$_FILES['codepic']['name'];
                        $imginfo=$_FILES['codepic']['tmp_name'];

                     
                            if(!empty($imginfo)){
                                $codepicture=$enrolcodepic;
                                $extension=["image/jpg","image/jpeg","image/webp","image/png"];
                                $finfo= new finfo(FILEINFO_MIME_TYPE);   
                                $mimetype =  $finfo->file($_FILES['codepic']['tmp_name']); 
                               // $imgextension=pathinfo($_FILES['codepic']['name'],PATHINFO_EXTENSION);
                              
                                if(!in_array($mimetype,$extension)){
                                    echo"<button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>upload only images here</button>
                                    ";
                                }
                                elseif($_FILES['codepic']['size']>2000000){
                                    echo"<button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>make sure image size is two 2mb and below</button>
                                    ";
                                }
                                else
                                {
                                    $stud=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND enrollcode='$enrolmentcode'");
                                    $cchk=mysqli_num_rows($stud);
                                    if($cchk==1)
                                    {
                                        echo
                                        '
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 style="font-weight:bold;text-align:center">Sorry Record already Exist with this Enrollment Code.</h4>
                                    </div>
                                        ';
                                    }
                                    else
                                    {
                                        $location="enrolcode_pic/";
                                        move_uploaded_file($_FILES['codepic']['tmp_name'],"$location".$codepicture);
                                   
                                        $exist=$_SESSION['studentname'];
                                        $admission=mysqli_query($conn,"update students set dob='$dob',religion='$religion',region='$region',district='$district',enrollcode='$enrolmentcode',codepic='$codepicture',jhsaddress='$jhsadress',pname='$pname',pcontact='$pcontact',hseaddress='$residentaddress',admstatus=1,tdate='$tdate',admrdate='$rdate' where studentindex='$sind' and schlname='$scl' ");
                                    if($admission)
                                    {
                                        echo
                                                    '
                                                    
                                                    <div class="alert alert-success alert-dismissible " role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 style="font-weight:bold;text-align:center">Your have Successfullly Updated your details.</h4>
                                                    </div>
                                                    ';	
                                    } else
                                    {
                                        echo
                                        "
                                       <button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>$exist Your Records Updates Failedy</button>
                                        ";
                                    
                                    }  
                                    }
                                    
                                }
                            }
                                else{
                                $admission=mysqli_query($conn,"update students set dob='$dob',religion='$religion',region='$region',district='$district',jhsaddress='$jhsadress',pname='$pname',pcontact='$pcontact',hseaddress='$residentaddress',admstatus=1,tdate='$tdate',admrdate='$rdate' where studentindex='$sind' and schlname='$scl' ");
                               if($admission) 
                               echo
                               '
                               
                               <div class="alert alert-success alert-dismissible " role="alert">
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                   </button>
                                   <h4 style="font-weight:bold;text-align:center">Your have Successfullly Updated your details.</h4>
                               </div>
                               ';	
                            }
                           
                           
                        
                        }
                       
                        
                    }
                
					?>
    <form class="" id="updateform" enctype="multipart/form-data" action="" method="post" novalidate>

<span class="section">Personal Record Form </span>
<div class="row">
    <div class="col-6">
    <label class="input-label">Date of Birth<span class="required">*</span></label>
    <div class="field item form-group">   
    <input class="form-control" class='date' max="2016-12-31" value="<?php echo $studarray['dob'] ?>" type="date" id="dob" name="dob" required='required'>
    </div>
    <label class="input-label">Religion *</label>
        <select name="religion" class="form-control" required>
        <option><?php echo $studarray['religion'] ?></option>
        <option>Christianity</option>
        <option>Islam</option>
        <option>Other</option>
        </select>
        <label class="input-label">JHS Address<span class="required">*</span></label>
        <div class="field item form-group">
        <textarea class="form-control" required="required" id="jhsadress" name='jhsadress'><?php echo $studarray['jhsaddress'] ?></textarea>
         </div>
<label class="input-label">Region</label>
<div class="field item form-group">
    <select name="region" onchange="showUser(this.value)" id=""  class="form-control" required>
    <option><?php echo $studarray['region'] ?></option>
    <?php  
    require("connect.php");
    $regions=mysqli_query($conn,"SELECT * FROM districts");
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
<label class="input-label">District</label>
<div class="field item form-group">
    <select name="district" onchange="showUser(this.value)" id=""  class="form-control" required>
    <option><?php echo $studarray['district'] ?></option>
    <?php  
    require("connect.php");
    $regions=mysqli_query($conn,"SELECT * FROM districts");
    WHILE($regarray=mysqli_fetch_array($regions))
    {
        echo
        "
        <option>$regarray[district]</option>
        ";
    }
    
    ?>
    </select>
</div>
<p id="txtHint"></p>
<input type="hidden" class="form-control" name="districtold" id="pname" value="<?php echo $studarray['district'] ?>" placeholder=""/>

    <label class="input-label">Parent/Guardian Name<span class="required">*</span></label>
    <div class="field item form-group">   
    <input class="form-control" name="pname" id="pname" value="<?php echo $studarray['pname'] ?>" placeholder="" required="required" />
    </div>



    <label class="input-label">Parent Contact<span class="required">*</span></label>
    <div class="field item form-group">   
    <input class="form-control" type="tel" value="<?php echo $studarray['pcontact'] ?>" class='tel' id="pcontact" name="pcontact" required='required' data-validate-length-range="10,12" />
    </div>
    <label class="input-label">Hse Address<span class="required">*</span></label>
    <div class="field item form-group">   
    <textarea class="form-control" required="required" id="haddress" name='haddress'><?php echo $studarray['hseaddress'] ?></textarea>
    </div>
    

    </div>
<div class="col-6">
 
<label class="input-label">Enrollment Code<span class="required">*</span></label>
<div class="field item form-group">    
<input class="form-control" value="<?php echo $studarray['enrollcode'] ?>" type="text" id="password1" name="password" pattern="" min="6" required='required' />
</div>   

    <label class="input-label">Confirm Code<span class="required">*</span></label>
    <div class="field item form-group">   
    <input class="form-control" type="text" value="<?php echo $studarray['enrollcode'] ?>" id="passwordtwo" name="password2" data-validate-linked='password' required='required' />
</div>
        <span style="color:red;font-weight:bold">You can Update your Picture if the previewed Image does not Match Your details.</span>
    <?php  
    if($studarray['admstatus']==1){
    echo" <img style='width:100%;height:300px' src='enrolcode_pic/$studarray[codepic]'>";
    echo"<input class='form-control' type='file' value='' name='codepic' class='optional'/>";
    echo"<input class='form-control' type='hidden' value='$studarray[codepic]' name='codepicold' class='optional' />";

    }
    else{
        echo"<input class='form-control' type='file' value='' name='codepic' class='optional'/ required='required'>";
    
    }
    ?>
    <label class="input-label">Date<span class="required">*</span></label>
        <input class="form-control" value="<?php echo $studarray['tdate'] ?>" class='date' type="date" id="tdate" name="tdate" required='required'>

    </div>

    
</div>



<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-12 offset-md-12">
            <button type='submit' id="submit" name="update" class="btn btn-success">Update</button>
            <a href="studpotal.php?id=<?php echo urlencode(encript($sind))?> && schl=<?php echo urlencode(encript($scl))?>"><i class="fa fa-step-backward" style="font-size:25px" >Back</i></a>
        </div>
        
        
    </div>
</div>
</form>



    
                                            <?php
                                        
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
<!-- jQuery Smart Wizard -->
<script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
<script type="text/javascript">
     $(window).load(function () {
        $('#myModal').modal('show');
        //$("#myModal").data('bs.modal')._config.backdrop = 'static'; 
        
    });
</script>
</body>

</html>
