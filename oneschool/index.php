<?PHP 
SESSION_START();
require("./model/model.php");
require("../admindesk/production/connect.php");
//require("encryption.php");

?>
<!--<script>
         function detectIE() {
           var ua = window.navigator.userAgent;
         
           var msie = ua.indexOf('MSIE ');
           if (msie > 0) {
            
             return "IE " + parseInt( ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
           }
         
           var trident = ua.indexOf('Trident/');
           if (trident > 0) {
            
             var rv = ua.indexOf('rv:');
             return "IE " + parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
           }
         
           var edge = ua.indexOf('Edge/');
           if (edge > 0) {
            
             return "Edge " + parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
           }
         
           // other browser
           return "false";
         }
         var result=detectIE();
         if (result=="false")
         {
           
         }
         else
         {
            window.location='initialstage.php';
         }
         
      </script>
<script>
 const channel = new BroadcastChannel('tab');

channel.postMessage('another-tab');
// note that listener is added after posting the message

channel.addEventListener('message', (msg) => {
  if (msg.data === 'another-tab') {
    // message received from 2nd tab
    alert('Cannot open multiple instances');
	window.location='index.php';
  }
});
      </script>!-->

<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/oneschool/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 20:32:09 GMT -->
<head>
<title>Online|Admission &mdash;</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

<script nonce="05395b9d-4c13-41b6-b5ba-2e362e2e31eb">(function(w,d){!function(bt,bu,bv,bw){bt[bv]=bt[bv]||{};bt[bv].executed=[];bt.zaraz={deferred:[],listeners:[]};bt.zaraz.q=[];bt.zaraz._f=function(bx){return function(){var by=Array.prototype.slice.call(arguments);bt.zaraz.q.push({m:bx,a:by})}};for(const bz of["track","set","debug"])bt.zaraz[bz]=bt.zaraz._f(bz);bt.zaraz.init=()=>{var bA=bu.getElementsByTagName(bw)[0],bB=bu.createElement(bw),bC=bu.getElementsByTagName("title")[0];bC&&(bt[bv].t=bu.getElementsByTagName("title")[0].text);bt[bv].x=Math.random();bt[bv].w=bt.screen.width;bt[bv].h=bt.screen.height;bt[bv].j=bt.innerHeight;bt[bv].e=bt.innerWidth;bt[bv].l=bt.location.href;bt[bv].r=bu.referrer;bt[bv].k=bt.screen.colorDepth;bt[bv].n=bu.characterSet;bt[bv].o=(new Date).getTimezoneOffset();if(bt.dataLayer)for(const bG of Object.entries(Object.entries(dataLayer).reduce(((bH,bI)=>({...bH[1],...bI[1]})),{})))zaraz.set(bG[0],bG[1],{scope:"page"});bt[bv].q=[];for(;bt.zaraz.q.length;){const bJ=bt.zaraz.q.shift();bt[bv].q.push(bJ)}bB.defer=!0;for(const bK of[localStorage,sessionStorage])Object.keys(bK||{}).filter((bM=>bM.startsWith("_zaraz_"))).forEach((bL=>{try{bt[bv]["z_"+bL.slice(7)]=JSON.parse(bK.getItem(bL))}catch{bt[bv]["z_"+bL.slice(7)]=bK.getItem(bL)}}));bB.referrerPolicy="origin";bB.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(bt[bv])));bA.parentNode.insertBefore(bB,bA)};["complete","interactive"].includes(bu.readyState)?zaraz.init():bt.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
<div class="site-mobile-menu site-navbar-target">
<div class="site-mobile-menu-header">
<div class="site-mobile-menu-close mt-3">
<span class="icon-close2 js-menu-toggle"></span>
</div>
</div>
<div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
<?php 
require("header.php");
?>
</header>
	<div class="intro-section" id="home-section">
	<div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="container">
	<div class="row align-items-center">
	<div class="col-12">
	<div class="row align-items-center">
	<div class="col-lg-6 mb-4">
	<div id="gmessage">
	<h3 data-aos="fade-up" style="background-color:#454545; color:#d70040;font-weight:bold" data-aos-delay="100">Very Important Notice! Read Carefully.</h3>
	<p style="background-color:#454545;color:white;" class="mb-4" data-aos="fade-up" data-aos-delay="200">This is Your First Step to Download your Admission. Make sure you select your <u style="background-color:darkcyan">Placed School</u> in the form, then ensure that you enter your right <u style="background-color:darkcyan">BECE Index Number</u>. Then use the Proceed button to the next Phase.</p>
	<p data-aos="fade-up"  data-aos-delay="300"><button style="font-weight:bold"  id="accessbtn" class="btn btn-primary py-3 px-5 btn-pill">Login To Student Portal</button></p>
	</div>
	
	</div>

	<div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">

	<div style="display:none;display:none;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative" class="btn btn-success"  id="success"></div>
			<div style="display:none;display:none;margin:auto;width:100%;min-width:100%;max-width:50%;position:rlative" class="btn btn-danger" id="error"></div>

	<form style="display:none" id="loginform" action="" method="post" name="" class="form-box">
			<h3 class="h4 text-black mb-4"></h3>
			<div class="form-group">
			</div>
			<div class="form-group">
			<input type="text" class="form-control" id="accesscode" name="accescode" placeholder="Enter Your Access/Enrollment Code">
			</div>
			<div class="form-group">
			<button style="background-color:#0096ff;font-weight:bold" type="submit" id="loginbtn" name="submit" class="btn btn-primary btn-pill" value="">Login</button>
			</div>
	</form>
	<form style="display:none" id="momoform" action="" method="post" name="" class="form-box">
			<h3 class="h4 text-black mb-4"></h3>
			<div class="form-group">
			</div>
			<div class="form-group">
			<input type="number" class="form-control" id="momonumber" name="momonumber" placeholder="Mobile Money Number">
			</div>
			<div class="form-group">
			<button type="submit" id="momobtn" name="submit" class="btn btn-primary btn-pill" value="">Make Payment</button>
			</div>
	</form>
	<form id="indexnumform" action="" method="post" name="" class="form-box">
			<h3 class="h4 text-black mb-4">Sign Up</h3>
			<div class="form-group">
			<div class="col-md-14 col-sm-14 ">
					<select id="schlname" name="schlname" class="form-control">
					<option></option>
					<?php 
					require("connect.php");
					$info=mysqli_query($conn,"SELECT * FROM schoolinfo where sstat='0'")or die(mysqli_error($conn));
					while($infoarray=mysqli_fetch_array($info))
					{
						echo"<option>$infoarray[schoolname]</option>";
						
					}
					?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
			<input type="text" oninput="enable_disabled()" class="form-control" id="indexnum" name="index" placeholder="Index">
			</div>
			<div class="form-group">
			<button style="background-color:#0096ff;font-weight:bold" type="submit" id="submit" name="submit" class="btn btn-primary btn-pill">Proceed</button>
			</div>
	</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="site-section bg-light" id="teachers-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-7">
<h2 class="section-title mb-3">Message Us </h2>
<p class="mb-5">Hello! Welcome to our Admission Portal, it is our hope that you find this portal friendly. Kindly leave us a message incase of any difficulty.</p>
<form method="post" data-aos="fade">
<div class="form-group row">
<div class="col-md-6 mb-3 mb-lg-0">
<input type="text" class="form-control" placeholder="First name">
</div>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="Last name">
</div>
</div>
<div class="form-group row">
<div class="col-md-12">
<input type="text" class="form-control" placeholder="Subject">
</div>
</div>
<div class="form-group row">
<div class="col-md-12">
<input type="email" class="form-control" placeholder="Email">
</div>
</div>
<div class="form-group row">
<div class="col-md-12">
<textarea class="form-control" id cols="30" rows="10" placeholder="Write your message here."></textarea>
</div>
</div>
<div class="form-group row">
<div class="col-md-6">
<input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<footer class="footer-section bg-white">
<?php 
//require("footer.php");
?>
</footer>
</div> 
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/main.js"></script>

<script>
let url="./controller/forms.php";


function verify(){
	setInterval((()=>{
	let indexnum=$("#indexnum").val();
	$.post(url,{verifybtn:1,indexnum:indexnum},(res,code)=>{
		if(res=="1"){
			$("#loginform").show();
			$("#indexnumform").hide();
			$("#momoform").hide();
		}

	})
}),5000)
}
$("#accessbtn").on("click",(e)=>{
	
			$("#loginform").show();
			$("#indexnumform").hide();
			$("#momoform").hide();
			$("#success").hide();
})

$("#loginbtn").on("click",(e)=>{
	e.preventDefault();
	let accesscode=$("#accesscode").val();
	$.post(url,{accesscode:accesscode,loginbtn:1},(res,code)=>{
		
		let bes=res.split("||");
		let test=bes[0];
		let opt=bes[1];
		let schl=bes[2];
		console.log(opt);
		if(opt=="100"){
			
			//let	uid="<?php// echo $_SESSION['indexnum']?>";
			window.location.href='../admindesk/production/studpotal.php?id='+test+ '&schl='+schl;
		}
		else{
			if(opt=="200"){
				window.location = '../admindesk/production/studindex.php?id='+test+ '&schl='+schl;	
			}
			else{
				$("#error").show();
			$("#error").html("Please check your Acces/Enrollment Code"); 
			}
			
		}


	})

})
$("#accesscode").on("input",(e)=>{
	$("#error").hide();
})
$("#momobtn").on("click",(e)=>{
	e.preventDefault();
	$("#momobtn").prop("disabled",true)
	$("#momobtn").html("Please wait")
 let momonumber=$("#momonumber").val();
 let indexnum=$("#indexnum").val();
    let schlname=$("#schlname").val();
 $.post(url,{momobtn:1,phonenumber:momonumber,indexnum:indexnum},(res,code)=>{
	if(res=="0001"){
		verify();
	}
 })
})

$("#schlname").on("click",(e)=>{
	$("#submit").prop("disabled",false);
	$("#submit").html("proceed");
	$("#error").hide();
})
$("#indexnum").on("input",(e)=>{
	$("#submit").prop("disabled",false);
	$("#submit").html("proceed");
	$("#error").hide();
})

$("#submit").on("click",(e)=>{
	e.preventDefault();
	$("#submit").prop("disabled",true)
	$("#submit").html("Please wait")
	let indexnum=$("#indexnum").val();
    let schlname=$("#schlname").val();
	$.post(url,{indexnum:indexnum,schlname:schlname,checkform:1},(res,code)=>{
		if(res=="1000"){
			$("#success").show();
			$("#success").html("Please make your payment to Proceed.");
			$("#indexnumform").hide();
			$("#loginform").hide();
			$("#momoform").show();
			$("#submit").prop("disabled",false)
	        $("#submit").html("proceed")
			//alert("Your Index Number Exit");
	}
		else
		{
			//$("#error").show();
			$("#error").show();
			$("#error").html("Please check your School Or indexnumber");
			$("#success").hide();
			$("#loginform").hide();
			$("#submit").prop("disabled",true);
		}
	})
	//e.preventDefault();
	//alert("Worked"+schlname)
});
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7f198faea8f37f08","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/oneschool/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 20:32:40 GMT -->
</html>