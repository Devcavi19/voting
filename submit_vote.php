<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[pres_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[vp_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[ua_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[ss_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[ea_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[sg_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[vtr_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[tas_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[ps_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("INSERT INTO `votes` (`candidate_id`, `voters_id`) VALUES('$_SESSION[as_id]', '$_SESSION[voters_id]')") or die($conn->error);
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die($conn->error);
		header("location:index.php");
		
?>