<?php
	require 'admin/dbcon.php';
	session_start(); 
	
	// Prevent caching of protected pages to prevent back-button access after logout
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	if(!ISSET($_SESSION['voters_id'])){
		// Set message for unauthorized access attempts
		$_SESSION['unauthorized'] = "You must login first to access this page.";
		header("location:login.php");
		exit;
	}else{
		$session_id=$_SESSION['voters_id'];
		$user_query = $conn->query("SELECT * FROM voters WHERE voters_id = '$session_id'") or die(mysqli_errno($conn));
		$user_row = $user_query->fetch_array();
		$user_username = $user_row['firstname']." ".$user_row['lastname'];
	}
?>