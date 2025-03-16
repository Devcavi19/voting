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
				alert('Error! Invalid Login/Email')
			</script>
			<?php
			return;
		}
		
		// Check if password matches
		$result = $conn->query("SELECT * FROM voters WHERE id_number = '$idno' && password = '".md5($password)."'");
		if($result->num_rows == 0) {
			?>
			<script type="text/javascript">
				alert('Error! Password did not match')
			</script>
			<?php
			return;
		}
		
		// Check if account is active and unvoted
		$result = $conn->query("SELECT * FROM voters WHERE id_number = '$idno' && password = '".md5($password)."' && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());
		$row = $result->fetch_array();
		$voted = $conn->query("SELECT * FROM `voters` WHERE id_number = '$idno' && password = '".md5($password)."' && `status` = 'Voted'")->num_rows;
		$numberOfRows = $result->num_rows;				
		
		if ($numberOfRows > 0){
			session_start();
			$_SESSION['voters_id'] = $row['voters_id'];
			header('location:vote.php');
		} else if($voted == 1){
			?>
			<script type="text/javascript">
				alert('Sorry You Already Voted')
			</script>
			<?php
		} else {
			?>
			<script type="text/javascript">
				alert('Your account is not Activated')
			</script>
			<?php
		}
	}
?>