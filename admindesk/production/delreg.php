<?php
require("connect.php");
$del=mysqli_query($conn,"delete from districts");
header("location:vreg.php")
?>