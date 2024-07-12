<?php
require("studsecret.php");
require("./model/model.php");
require("encryption.php");
require("connect.php");
$ind=$_GET['sindex'];
$sind=decript($ind);
$cl=$_GET['id'];
$scl=decript($cl);
?>
<html lang="en">
<head>
    <?php 
	require("homehead.php");
	?>
     <script src= 
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"> 
	</script>
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
    <link href="print.css" type="text/css" rel="print" media="print">
    <style media="print">
        footer{
            display:none;
           
        }
        .top_nav{
            display:none;
            
        }
        #botton{
            display:none;
        }
        #mydoc{
        }
    </style>
    <style>
      h1{
       width:100%;
       text-align:center;
       font-size:40px;
       margin-right:20px;
      } 
      .conclude{
        width:40%;
        float:right;
        font-size:20px;
        font-family:times-new-roman;
        color:black;
      }
      .student{
        padding-top:120px;
        margin-right:350px;
        margin-left:20px;
        font-family:times-new-roman;
        font-size: 20px;
        color:black; 
      }
      .firstparagraph{
        text-align:center;
        margin-right:20%;
      }
      p{
        padding-left:20px;
        font-size: 50px;
      }
      @media print{
       body{
       display:hidden;
       }
        .top_nav{
            visibility:hidden;
        }
        .imgdiv{
        width:100%; 
      }
      h1{
        text-decoration:underline !important;
      }
        button{
            visibility:hidden;
        }
        .pull-right{
            display:none;
        }
        
        .x_panel{
            box-shadow:none !important;
            border:none !important;
        }
        .letter{
            font-size:23px !important;
        }
        .left_col scroll-view{
            display:none !important;
        }
        .col-md-3 left_col{
            display:none;
        }
        @page{
           size:auto;
            margin:0mm;
        }
        .profile_pic,.profile_info{
            display:none !important;
        }
        #sidebar-menu{
            display:none !important;
        }
        .col-md-12 offset-md-12 hidden-lg{
            display: none!important;
        }
      }

    </style>
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
                     $admitted=mysqli_query($conn,"select * from students where schlname='$scl' AND studentindex='$sind' AND admstatus='1'");
      
                     $studarray=mysqli_fetch_array($admitted);
					require("studsidenav.php");
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
                                
    <div class="x_content" >
     <?php 
      require("connect.php");
     
      $let=mysqli_query($conn,"select * from admisletter where schoolname='$scl'");
      $letarray=mysqli_fetch_array($let);
      ?>

    <div id="mydoc">
        <div class="imgdiv">
            <img src="./letter/<?php echo $letarray['letterhead'] ?>" style="width:100%;height:220px">
        </div>
      
       <?php 
        /*require("connect.php");

        $admitted=mysqli_query($conn,"select * from students where admstatus='1'  and schlname='$scl'");

        $count=0;
        while($array=mysqli_fetch_array($admitted)){
         echo $count++;
        }*/
       
        $let=mysqli_query($conn,"select * from admisletter where schoolname='$scl'");
        $letarray=mysqli_fetch_array($let);
        $str=$letarray['letter'];
        $find= ['#schoolname','#name','#index','#track','#gender','#programme', '#status','#house','#jhsname','admnumb'];
        $replaced=[$letarray['schoolname'],$studarray['studname'],$studarray['studentindex'],$studarray['track'],$studarray['gender'],$studarray['programme'], $studarray['sstatus'],$studarray['house'],$studarray['jhsname'],$studarray['admnum']];
        $result=str_replace($find,$replaced,$str);
        
        ?>
        <h1 style="font-size:22px;font-weight:bold;font-family:times new roman;color:black" class="mt-2"><u><?php echo nl2br($letarray['refrence']) ?></u></h1></br>
        <p class="letter" style="font-size:20px;color:black;font-family:times new roman"><?php echo nl2br($result) ?></p> 
       
        <p class="conclude">
            Yours faithfully</br>
            <img src="signatures/<?php echo $letarray['headsign'] ?>" style="with:50px;height:50px" ></img></br>
            <?php echo $letarray['headname'] ?>
            [HEADMASTER] 
        </p><br>
        <?php
        if($studarray['schlname']=="Wulugu Senior High School" || ($studarray['schlname']=="Langbinsi Senior High Technical School")||($studarray['schlname']=="STEM SENIOR HIGH SCHOOL- KPASENKPE"))
        {
            ?>
            <h3 class="student mt-2 ">
            <?php
            $gender=$studarray['gender'];
            if($gender=='Male'){
                echo 'Master';
            }else{
                echo 'Miss';
            }?><br>
            <?php echo $studarray['studname'] ?><br>
            <?php echo nl2br($studarray['jhsaddress']) ?></br>
            </h3>
            <?php

        }else{
            
        }
        ?>
    </div>
        
            <div class="col-md-12 offset-md-12 hidden-lg" id="botton">
                 <button type='submit' id="submit" onclick="window.print();return false;" class="btn btn-success">Print Admission</button>
                 <!--<button type='submit' id="download-pdf" class="btn btn-success">Print Admission</button>-->
                 <a href="studpotal.php?id=<?php echo urlencode(encript($sind))?> && schl=<?php echo urlencode(encript($scl))?>"><i class="fa fa-step-backward" style="font-size:25px" >Back</i></a>
            </div>             
        </div>
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
        document.getElementById('download-pdf') 
        .addEventListener('click', () => { 
            const element = document.getElementById('mydoc'); 
            const options = { 
                filename: 'GFG.pdf', 
                margin: 0, 
                padding:10,
                image: { type: 'jpeg',width:210,height:50, quality: 0.98 }, 
                html2canvas: { scale: 2 }, 
                jsPDF: { 
                    unit: 'mm', 
                    format: 'a4', 
                    orientation: 'portrait',
                    putOnlyUsedFonts:'false'
                } 
            }; 
            html2pdf().set(options).from(element).save(); 
        }); 
    </script> 
   <script>
        var ss=Math.max(document.documentElement.cliemtWidth,window.innerWidth || 0);
        if(ss<=840){
            $("#submit").hide();
        }
        $(window).on("resize",function(){
            ss=Math.max(document.documentElement.cliemtWidth,window.innerWidth || 0);
        if(ss<=840){
            $("#submit").hide();
        }else{
            $("#submit").show();
        }
        })
    </script>
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
	
	</script>


     Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
