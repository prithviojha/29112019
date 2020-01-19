<?php
include 'connection.php';

	$id=$_GET['id'];
	$q="DELETE FROM `user_info` WHERE id=$id";
	$query=mysqli_query($conn,$q);
	header("location:display.php");

?>