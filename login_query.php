<?php
	require_once 'admin/dbcon.php';
	
	if(isset($_POST['login'])){
		$idno=$_POST['idno'];
		$password=$_POST['password'];
		
		// Check for empty fields
		if(empty($idno) || empty($password)) {
			?>
			<script type="text/javascript">
				alert('Error! Login field cannot be empty, please try again')
			</script>
			<?php
			return;
		}
		
		// Check if ID exists
		$id_check = $conn->query("SELECT * FROM voters WHERE id_number = '$idno'");
		if($id_check->num_rows == 0) {
			?>
			<script type="text/javascript">
				alert('Error! The student ID does not exist. Please try again')
			</script>
			<?php
			return;
		}
		
		// Get voter data and verify password
		$voter = $id_check->fetch_array();
		if(!password_verify($password, $voter['password'])) {
			?>
			<script type="text/javascript">
				alert('Error! Password did not match')
			</script>
			<?php
			return;
		}
		
		// Check if account is active and unvoted
		if($voter['account'] != 'Active') {
			?>
			<script type="text/javascript">
				alert('Your account is not activated')
			</script>
			<?php
			return;
		}
		
		if($voter['status'] == 'Voted') {
			?>
			<script type="text/javascript">
				alert('Sorry You Already Voted')
			</script>
			<?php
			return;
		}
		
		// If all checks pass, proceed with login
		session_start();
		$_SESSION['voters_id'] = $voter['voters_id'];
		header('location:vote.php');
	}
?>