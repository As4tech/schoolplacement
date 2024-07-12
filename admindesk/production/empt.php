<?php 
require("connect.php");
require('encryption.php');
$s=$_GET['scl'];
$sc=decript($s);
if(!empty($sc)){
    $del=mysqli_query($conn,"delete from students where schlname='$sc'");
header("location:viewenrollment.php");
}else{
    $del=mysqli_query($conn,"truncate students");
    header("location:viewenrollment.php");
}

?>