<?php
	$conn = new mysqli(hostname: 'localhost', username: 'root', password: 'admin123', database: 'vote');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>	
