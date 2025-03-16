<?php
	require_once 'dbcon.php';
	session_start();
	$user_id=$_GET['user_id'];
	$conn->query("DELETE FROM users WHERE user_id='$user_id'") or die($conn->error);
	?>
	<script>
		alert("User has been successfully deleted");
		window.location = 'user.php';
	</script>
	<?php
	exit();
?>