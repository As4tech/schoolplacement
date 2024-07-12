<?php
require("connect.php");
$del=mysqli_query($conn, "delete from admisletter where id='$_GET[id]'");
header("location:viewletter.php");
?>