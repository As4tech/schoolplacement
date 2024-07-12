<?php 
require("connect.php");
require("encryption.php");
$id=$_GET['id'];
$iddel=decript($id);
$del=mysqli_query($conn,"delete from students where id='$iddel'");
header("location:viewenrollment.php");
?>