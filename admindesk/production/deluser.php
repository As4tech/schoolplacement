<?php
require("connect.php");
require("encryption.php");
$uid=$_GET['id'];
$uidget=decript($uid);
$del=mysqli_query($conn,"delete from users where id='$uidget'");
header("location:vusers.php")
?>