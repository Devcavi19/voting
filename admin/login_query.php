<?php
	require_once 'dbcon.php';
	
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$login_id = $_POST['login_id'];
		
		// Check for empty fields
		if(empty($username) || empty($password) || empty($login_id)) {
			?>
			<script type="text/javascript">
			alert('Error! Login field cannot be empty, please try again');
			</script>
			<?php
			return;
		}
		
		// Check if username and login_id exist
		$user_check = $conn->query("SELECT * FROM user WHERE username = '$username' AND user_id = '$login_id'");
		if($user_check->num_rows == 0) {
			?>
			<script type="text/javascript">
			alert('Error! The email or login ID does not exist. Please try again');
			window.location = 'index.php';
			</script>
			<?php
			return;
		}
		
		// Get user data and verify password
		$fetch = $user_check->fetch_array();
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
		?>
		<script type="text/javascript">
		alert('WelCome!');
		window.location = 'candidate.php';
		</script>
		<?php
		session_start();
		$_SESSION['id'] = $fetch['user_id'];
	}
?>