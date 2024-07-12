<?php
SESSION_START();
require("../model/model.php");
require("./connect.php");
	 if(isset($_POST['submit']))
	   {
		   $levelname=$_POST['levelname'];
		   $tdate=$_POST['tdate'];
		   $ttime=$_POST['ttime'];
		   //$acess=mysqli_query($conn,"SELECT * FROM accesslevel WHERE levelname='$lname'")or die(mysqli_error($conn));
		   //$countaccess=mysqli_num_rows($acess);
		   $access=models::dbview($pdo,"accesslevel","levelname='$levelname'");
		   $jason=json_decode($access);
		   $cjason=count($jason);
		   if($cjason==1)
		   {
			   echo 1;
			   
		   }
		   ELSE
		   {
			   $insertaccess=models::dbinsert($pdo,"accesslevel","levelname","tdate","time","$levelname","$ddate","$ttime");
			   IF($insertaccess)
			   {
				   echo 2;
				 
			   }
		   }
	   }
		?>