<?php
	$conn = new mysqli('localhost', 'root', 'admin123', 'vote');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>	
