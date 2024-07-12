<?php
require("connect.php");
require("encryption.php");
$accid=$_GET['id'];
$uidget=decript($accid);
$del=mysqli_query($conn,"delete from acceptance where id='$uidget'");
header("location:vacceptlet.php")
?> 