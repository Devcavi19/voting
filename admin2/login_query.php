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
		$user_check = $conn->query("SELECT * FROM users WHERE username = '$username' AND user_id = '$login_id'");
		if($user_check->num_rows == 0) {
			?>
			<script type="text/javascript">
			alert('Error! Invalid Login/Email');
			window.location = 'index.php';
			</script>
			<?php
			return;
		}
		
		// Check if password matches
		$query = $conn->query("SELECT * FROM users WHERE username = '$username' AND user_id = '$login_id'");
		$fetch = $query->fetch_array();
		if($fetch['password'] != $password) {
			?>
			<script type="text/javascript">
			alert('Error! Password did not match');
			window.location = 'index.php';
			</script>
			<?php
			return;
		}
		
		// If all checks pass, proceed with login
		$query = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_id = '$login_id'") or die($conn->error);
		$rows = $query->num_rows;
		$fetch = $query->fetch_array();
		
		if ($rows > 0) {
			$conn->query("INSERT INTO logins(username) VALUES('$username');") or die($conn->error);//Inserts username for tracking logs..security feature
			
			?>
			<script type="text/javascript">
			alert('WelCome!');
			window.location = 'candidate.php';
			</script>
			<?php
			session_start();
			$_SESSION['id'] = $fetch['user_id'];
		}
	}
?>