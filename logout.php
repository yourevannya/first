<?php 
	//awalan menggunakan session
	session_start();

	session_unset();
	session_destroy();

	//arahkan ke login.php
	header("location:login.php");
	exit;

?>