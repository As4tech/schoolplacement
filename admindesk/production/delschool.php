<?php
require("connect.php");
require("encryption.php");
$delschl=decript($_GET['schlcode']);
$delschl=mysqli_query($conn,"delete from schoolinfo where schlcode='$delschl'");
header("location:vschl.php");
?>