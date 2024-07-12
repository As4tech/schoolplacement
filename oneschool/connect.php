<?php 
$conn=mysqli_connect("localhost","root","","admindesk")or die(mysqli_error($conn));
$pdo=new PDO("mysql:host=localhost;dbname=admindesk",'root','');

?>