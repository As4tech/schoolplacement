<?php
require("connect.php");
require("encryption.php");
$hseid=$_GET['id'];
$gethseid=decript($hseid);
$del=mysqli_query($conn,"delete from houses where id='$gethseid'");
header("location:hseview.php")
?>