<?php 
SESSION_START();
if($_SESSION['opuname']=='101554@!&%3xxp')
{
    header("location:logoutstud.php");
}
elseif(!isset($_SESSION['opuname']) || $_SESSION['opuname'] !='11ee554@!&%3op')
{
header("location:logout.php");
}
?>