<?php 
SESSION_START();
if($_SESSION['uname']=='11aA554@!&%5')
{
	header("location:logoutstud.php");
}
elseif(!isset($_SESSION['level']) || $_SESSION['uname']!=='11ee554@!&%3')
{
	header('location:logout.php');
}
