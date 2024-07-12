<?php
SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initialscale=1.0">
		<title>index</title>
		<link rel="stylesheet" href="style.css">
	</head>
		<body>
			<section>
				<div class="form-container">
				<h1>LOGIN FORM</h1>
				<form action="#" method="post">
				<?php 
				if(isset($_POST['login']))
				{
					require("production/connect.php");
					require('production/encryption.php');
					$schlcode=mysqli_real_escape_string($conn,$_POST['schlcode']);
					$pass=$_POST['password'];
					$encrypt=mysqli_query($conn,"select * from users where schoolcode='$schlcode'");
					$roes=mysqli_num_rows($encrypt);
					if($roes>=1)
					{
						$passaray=mysqli_fetch_array($encrypt);
						$paw= $passaray['upassword'];
						$password=decript($paw);
						if($pass==$password){
							$_SESSION['username']="$passaray[username]";
							$_SESSION['fname']="$passaray[fullname]";
							$_SESSION['level']="$passaray[ulevel]";
							$_SESSION['schlname']="$passaray[schoolname]";
							$_SESSION['schlcode']="$passaray[schoolcode]";
								if($_SESSION['level']=="Admin")
								{
								header('location:production/userdashboard.php');
								$_SESSION['opuname']='11ee554@!&%3op';
								$_SESSION['uname']='11ff554@!&%3';
								
								}
								elseif($_SESSION['level']=="Super Admin")
								{
								header('location:production/index.php');
								$_SESSION['opuname']='11ee554@!&%3op';	
								$_SESSION['uname']='11ee554@!&%3';	
								}else{
									header("location:index.php");
								}
							}
							else
							{
								echo"
								 <div style='background:#800000;color:#fff' id='mydiv' class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
								<h3><i class='ace-icon fa fa-times'></i></h3>
								</button>
								<strong>Incorrect  Password  or School Code</strong>
								<br />
								</div>";
							}
						}
					
						
					}else{
						
					}

					//$password=mysqli_real_escape_string($conn,openssl_encrypt($_POST['password'],"AES-256-CBC","hello",0,"1234567890123456"));
					//$users=mysqli_query($conn,"SELECT * FROM users WHERE schoolcode='$schlcode' AND upassword='$calcmac'")or die(mysqli_error($conn));
					//$countusers=mysqli_num_rows($users);
					//if($countusers == 1)
					//{

				//}
				?>
					<div class="control">
					<label for="name">School Code</label>
					<input autocomplete="off" type="text" name="schlcode" id="name">
					</div>
						<div class="control">
						<label for="psw">Password</label>
						<input type="password" name="password" id="psw">
						</div>
					<span><input type="checkbox">Remember me</span>
					<div class="control">
					<input type="submit" name="login" value="login">
					</div>
			    </form>
				<div class="link">
				<a href="#">Forgot password</a>
			</section>


		</body>
</html>