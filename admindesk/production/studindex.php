<?php 
require("studsecret.php");
require("encryption.php");
$id=$_GET['id'];
$sid=decript($id);
$cl=$_GET['schl'];
$scl=decript($cl);
$ssid=urlencode(encript($sid));
$sscl=urlencode(encript($scl));
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
    <style>
#registration-step{margin:0;padding:0;}
#registration-step li{list-style:none; float:left;padding:5px 10px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
#registration-step li.highlight{background-color:#EEE;}
#registration-form{clear:both;border:1px #EEE solid;padding:20px;}
.demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.registration-error{color:#FF0000; padding-left:15px;}
.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
.btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function validate() {
var output = true;
$(".registration-error").html('');
if($("#password-field").css('display') != 'none') {
	if(!($("#dob").val())) {
		output = false;
		$("#doberror").html("Date of Birth Required");
	}	
    if(!$("#rel").val()){
        output=false;
        $("#relerror").html("Relion is Required");
    }
	if(!($("#jhsname").val())){
        out=false;
        $("#jhsnameerror").html("JHS Name Required");
    }
    if(!($("#jhsadress").val())){
        out=false;
        $("#jhserror").html("JHS Address Required");
    }
    if(!($("#reg").val())){
        $("#regerror").html("Region is Required");
        output=false;
    }
    if(!($("#dist").val())){
        $("#disterror").html("District is Required");
        output=false;
    }
    if(!($("#pname").val())){
        $("#pnerror").html("Parent Name Required");
        output=false;
    }
    if(!($("#pcontact").val())){
        $("#perror").html("Parent Contact Required");
        output=false;
    }
    if(!($("#haddress").val())){
        output=false;
        $("#herror").html("House Address Required")
    }
   
}

if($("#general-field").css('display') !='none'){
    if(!($("#password1").val())){
        output=false;
        $("#password-error").html("Enrollment Code is Required")
    }
    if(!($("#passwordtwo").val())){
        $("#password-error").html("required");
        output=false;
    }
    if($("#password1").val() != $("#passwordtwo").val()){
        $("#confirm-password-error").html("Not Matched");
    }
    
}
return output;
}
$(document).ready(function() {
	$("#next").click(function(){
		var output = validate();
		if(output) {
			var current = $(".highlight");
			var next = $(".highlight").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".highlight").removeClass("highlight");
				next.addClass("highlight");
				if($(".highlight").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();				
				}
			}
		}
	});
	$("#back").click(function(){ 
		var current = $(".highlight");
		var prev = $(".highlight").prev("li");
		if(prev.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			prev.addClass("highlight");
			if($(".highlight").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();			
			}
		}
	});
});
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
                        $stud=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND studentindex='$sid'");
                        $studarray=mysqli_fetch_array($stud);
                        $cadmitted=mysqli_num_rows($stud);
					//require("studsidenav.php");
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
             
                   
                   

        <div class="modal fade bs-example-modal-lg" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" id="myModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo $studarray['studname'] ?></h4>
                
            </div>
            <div class="modal-body">
            <?php
    if(isset($_POST['submit']))
       {
            if(!empty($_POST['jhsadress']) and !empty($_POST['haddress']))
            {
                require("connect.php");
                $dob=mysqli_real_escape_string($conn,$_POST['dob']);
                $religion=mysqli_real_escape_string($conn,$_POST['religion']);
                $enrolmentcode=mysqli_real_escape_string($conn,$_POST['password']);
                $jhsadress=mysqli_real_escape_string($conn,$_POST['jhsadress']);
                $jhsname=mysqli_real_escape_string($conn,$_POST['jhsname']);
                $region=mysqli_real_escape_string($conn,$_POST['region']);
                $district=mysqli_real_escape_string($conn,$_POST['district']);
                $pname=mysqli_real_escape_string($conn,$_POST['pname']);
                $pcontact=mysqli_real_escape_string($conn,$_POST['pcontact']);
                $residentaddress=mysqli_real_escape_string($conn,$_POST['haddress']);
                $tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
                $rdate=date('Y-m-d');
                $enrolcodepic=$_SESSION['indexnum'].$_FILES['codepic']['name'];
                $imginfo=$_FILES['codepic']['tmp_name'];

                
                    if(!empty($imginfo))
                    {
                        $codepicture=$enrolcodepic;
                        $extension=["image/jpg","image/jpeg","image/webp","image/png"];
                        $finfo= new finfo(FILEINFO_MIME_TYPE);   
                        $mimetype =  $finfo->file($_FILES['codepic']['tmp_name']); 
                        // $imgextension=pathinfo($_FILES['codepic']['name'],PATHINFO_EXTENSION);
                        
                        if(!in_array($mimetype,$extension))
                        {
                            echo"<button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>upload only images here</button>
                            ";
                        }
                        elseif($_FILES['codepic']['size']>2000000)
                        {
                            echo"<button class='btn btn-danger' style='pointer-events:none;display:block;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative'>make sure image size is two 2mb and below</button>
                            ";
                        }
                        else
                            {
                                $adms=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND admstatus='1'");
                                $cadm=mysqli_num_rows($adms);
                                $count=1;
                                $admnum=$cadm+$count;
                                    $duts=mysqli_query($conn,"SELECT * FROM students where schlname='$scl' AND enrollcode='$enrolmentcode'");
                                    //$studarray=mysqli_fetch_array($stud);
                                    $chck=mysqli_num_rows($duts);
                                    if($chck==0)
                                    {
                                       //echo 10000;
                                             $location="enrolcode_pic/";
                                            move_uploaded_file($_FILES['codepic']['tmp_name'],"$location".$codepicture);
                                            $exist=$_SESSION['studentname'];
                                            $admission=mysqli_query($conn,"update students set dob='$dob',religion='$religion',region='$region',district='$district',
                                            enrollcode='$enrolmentcode',codepic='$codepicture',jhsname='$jhsname',jhsaddress='$jhsadress',pname='$pname',pcontact='$pcontact',
                                            hseaddress='$residentaddress',admstatus=1,admnum='$admnum',admrdate='$rdate' where studentindex='$sid' and schlname='$scl'");
                                           
                                             if($admission)
                                                {
                                                    /*echo 1;
                                                    $sel=mysqli_query($conn,"select * from students where studentindex='$sid' and schlname='$scl'");
                                                    $arae=mysqli_fetch_array($sel);
                                                    $id="$arae[studentindex]";
                                                    $schl="$arae[schlname]";
                                                    $ssid=urlencode(encript($id));
                                                    $sscl=urlencode(encript($schl));
                                                    //header("location:studpotal.php");
                                                    /*$_SESSION['district']="$arae[district]";
                                                    $_SESSION['pname']="$arae[pname]";
                                                    $_SESSION['pcontact']="$arae[pcontact]";
                                                    $_SESSION['hseaddress']="$arae[hseaddress]"; >*/
                                                    echo
                                                    "
                                                    <script>
                                                    window.location.href='studpotal.php?id=$ssid & schl=$sscl';
                                                    </script>
                                                    
                                                    ";
                                                
                                                } 
                                            else
                                                {
                                                    echo
                                                    '
                                                    
                                                    <div class="alert alert-danger alert-dismissible " role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 style="font-weight:bold;text-align:center"><strong>Sorry!</strong> Record Update Failed.</h4>
                                                    </div>
                                                    ';	 
                                                
                                                }
                                    }
                                    else
                                    {
                                        echo
                                        '
                                        
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 style="font-weight:bold;text-align:center"><strong>Sorry!</strong> Record already Exist.</h4>
                                        </div>
                                        ';	 
                        
                                    }    
                            }
                      /* else
                        {
                            echo
                            '
                            
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 style="font-weight:bold;text-align:center"><strong>Sorry!</strong> Record already Exist.</h4>
                            </div>
                            ';	 
            
                        }*/
                    }
             }
                    
                
            
         }
            
            
        

    ?>

     <div class="message"><?php if(isset($message)) ?></div>
    <ul id="registration-step">
    <li id="account" class="highlight">PREVIEW</li>
    <li id="password">ADDITIONAL INFO.</li>
    <li id="general">ENROLLMENT CODE</li>
    </ul>
    <form name="frmRegistration" enctype="multipart/form-data" id="registration-form" method="post">
    <div id="account-field">
    <label class="input-label">School Name<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['schlname'];  ?>" name="sclname" id="sclname" placeholder="" required="required" />
        
        <label class="form-label">Index Number<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['studentindex']; ?>" name="indexnum" id="indexnum" placeholder="" required="required" />
        
        <label class="input-label">Student Name<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['studname'];  ?>" name="studname" id="studname" placeholder="" required="required" />
        
        <label class="form-label">Gender<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['gender']; ?>" name="gender" id="gender" placeholder="" required="required" />
        
        <label class="form-label">Track<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['track']; ?>" name="track" id="indexnum" placeholder="" required="required" />
        
        <label class="input-label">Status<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['sstatus'];  ?>" name="status" id="status" placeholder="" required="required" />
    
        <label class="form-label">Aggregate<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['aaggregate']; ?>" name="grade" id="grade" placeholder="" required="required" />

        <label class="form-label">Programme<span class="required">*</span></label>
            <input class="form-control" readonly value="<?php echo $studarray['programme']; ?>" name="program" id="program" placeholder="" required="required" />
        

    </div>
    <div id="password-field" style="display:none;">

    <label class="input-label">Date of Birth<b style="color:red;font-size:15">*</b><span id="doberror" class="registration-error">*</span></label>
        <div class="field item form-group">   
        <input class="form-control" class='date' max="2016-12-31" value="<?php echo $studarray['dob'] ?>" type="date" id="dob" name="dob" required>
        </div>
        <label class="input-label">Religion<b style="color:red;font-size:15">*</b><span id="relerror" class="registration-error">*</span></label>
        <div class="field item form-group">
            <select name="religion" id="rel" class="form-control" required>
            <option><?php echo $studarray['religion'] ?></option>
            <option>Christianity</option>
            <option>Islam</option>
            <option>Other</option>
            </select>
        </div>
            <label class="input-label">JHS Name<b style="color:red;font-size:15">*</b><span id="jhsnameerror" class="registration-error">*</span></label>
            <div class="field item form-group">
            <textarea class="form-control" required="required" id="jhsname" name='jhsname'><?php echo $studarray['jhsname'] ?></textarea>
            </div>
            <label class="input-label">JHS Address<b style="color:red;font-size:15">*</b><span id="jhserror" class="registration-error">*</span></label>
            <div class="field item form-group">
            <textarea class="form-control" required="required" id="jhsadress" name='jhsadress'><?php echo $studarray['jhsaddress'] ?></textarea>
            </div>
    <label class="input-label">Region<b style="color:red;font-size:15">*</b><span id="regerror" class="registration-error">*</span></label>
    <div class="field item form-group">
        <select name="region" onchange="showUser(this.value)" id="reg"  class="form-control" required>
        <option><?php echo $studarray['region'] ?></option>
        <?php  
        require("connect.php");
        $regions=mysqli_query($conn,"SELECT distinct region FROM districts");
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
    <label class="input-label">District <b style="color:red;font-size:15">*</b><span id="disterror" class="registration-error">*</span></label>
    <div class="field item form-group">
        <select name="district" id="dist"  class="form-control" required>
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
    <input type="hidden" class="form-control" name="districtold" value="<?php echo $studarray['district'] ?>" placeholder=""/>

        <label class="input-label">Parent/Guardian Name<b style="color:red;font-size:15">*</b><span id="pnerror" class="registration-error">*</span></label>
        <div class="field item form-group">   
        <input class="form-control" name="pname" id="pname" value="<?php echo $studarray['pname'] ?>" placeholder="" required="required" />
        </div>



        <label class="input-label">Parent Contact<b style="color:red;font-size:15">*</b><span id="perror" class="registration-error">*</span></label>
        <div class="field item form-group">   
        <input class="form-control" type="tel" value="<?php echo $studarray['pcontact'] ?>" class='tel' id="pcontact" name="pcontact" required='required' data-validate-length-range="10,12" />
        </div>
        <label class="input-label">Hse Address<b style="color:red;font-size:15">*</b><span id="herror" class="registration-error">*</span></label>
        <div class="field item form-group">   
        <textarea class="form-control" required="required" id="haddress" name='haddress'><?php echo $studarray['hseaddress'] ?></textarea>
        </div>

    </div>
    <div id="general-field" style="display:none;">

    <label class="input-label">Enrollment Code<b style="color:red;font-size:15">*</b><span class="required">*</span></label>
    <div class="field item form-group">    
<input class="form-control" value="<?php echo $studarray['enrollcode'] ?>" type="text" id="password1" name="password" min="6"  />
</div> 
        <label class="input-label">Confirm Code<b style="color:red;font-size:15">*</b><b style="color:red;font-size:15">*</b><span class="required">*</span></label>
        <div class="field item form-group">   
        <input class="form-control" type="text" value="<?php echo $studarray['enrollcode'] ?>" id="passwordtwo" name="password2" data-validate-linked='password' required='required' />
    </div>
    <span style="color:red;font-weight:bold">Please take a clear picture of the page that contains the Enrollment Code.</span>
    <input class='form-control' type='file' value='' name='codepic' class='optional' required='required'>
        
        <label class="input-label">Date<b style="color:red;font-size:15">*</b><span class="required">*</span></label>
            <input class="form-control"  class='date' type="date" id="tdate" name="tdate" required='required'>

    </div>
    <div>
    <input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
    <input class="btnAction" type="button" name="next" id="next" value="Next" >
    <input class="btnAction" type="submit" name="submit" id="finish" value="Submit" style="display:none;">
    </div>
    </form>

            </div>
            </div>
        </div>
    </div>
   <?php
//}
?>

    
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
