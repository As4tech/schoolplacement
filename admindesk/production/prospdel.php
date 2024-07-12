<?php
require("connect.php");
require("encryption.php");
$prospid=$_GET['id'];
$pidget=decript($prospid);
$del=mysqli_query($conn,"delete from prospectus where id='$pidget'");
header("location:prospectview.php")
?> 