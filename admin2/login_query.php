<?php
	require_once 'dbcon.php';
	
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		// Check for empty fields
		if(empty($username) || empty($password)) {
			?>
			<script type="text/javascript">
			alert('Error! Login fields cannot be empty, please try again');
			</script>
			<?php
			return;
		}
		
		// Check if username exists and verify password
		$query = $conn->query("SELECT * FROM users WHERE username = '$username'");
		if($query->num_rows == 0) {
			?>
			<script type="text/javascript">
			alert('Error! Username does not exist. Please try again');
			window.location = 'index.php';
			</script>
			<?php
			return;
		}
		
		$fetch = $query->fetch_array();
		if(!password_verify($password, $fetch['password'])) {
			?>
			<script type="text/javascript">
			alert('Error! Password did not match');
			window.location = 'index.php';
			</script>
			<?php
			return;
		}
		
		// If all checks pass, proceed with login
		$conn->query("INSERT INTO logins(username) VALUES('$username');") or die($conn->error);//Inserts username for tracking logs..security feature
		
		session_start();
		$_SESSION['id'] = $fetch['user_id'];
		?>
		<script type="text/javascript">
		alert('Welcome!');
		window.location = 'candidate.php';
		</script>
		<?php
	}
?>