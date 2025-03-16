<?php 
// Start session at the beginning of the file
session_start();

// Check for back button navigation to prevent access to protected pages after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include ('head.php');
?>

<body>
<?php include ('index_banner.php');?>
    <div class="container">
        <div class="row">
		
                    <center> 
                        <i>Login As:</i>
                        <select onchange = "page(this.value)">
                            <option selected disables>System Admin</option>
                            <option value = "../admin2/index.php">System User</option>
                            <option value = "../login.php">Student Voter</option> 
                    </select>
                        
                    </center>
            <div class="col-md-4 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    
                    <div class="form-heading">
                        <center>Admin Log in</center>
                    </div>
                    <div class="panel-body">
                        <?php
                        // Display logout message if set
                        if(isset($_SESSION['logout_msg'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['logout_msg'] . '</div>';
                            // Clear the message after displaying
                            unset($_SESSION['logout_msg']);
                        }
                        
                        // Display unauthorized access message if set
                        if(isset($_SESSION['unauthorized'])) {
                            echo '<div class="alert alert-warning">' . $_SESSION['unauthorized'] . '</div>';
                            // Clear the message after displaying
                            unset($_SESSION['unauthorized']);
                        }
                        ?>
                        <form role="form" method = "post" enctype = "multipart/form-data">
                                <div class="form-group">
                                    <label for = "username" >Login ID</label>
                                        <input class="form-control" placeholder="Enter Login ID" name="login_id" type="text" autofocus>
                                </div>
							
                                <div class="form-group">
									<label for = "username" >Username</label>
										<input class="form-control" placeholder="Enter Username" name="username" type="text" autofocus>
                                </div>
								
                                <div class="form-group">
									<label for = "username" >Password</label>
										<input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                                </div>
                             
                              
                                <button class="btn btn-lg btn-success btn-block " name = "login">Login</a>
							
									<?php include ('login_query.php');?>
                        </form>
                    </div>
                </div>
            </div>
			
			 </div>
        </div>
    </div>
    <script type="text/javascript">
  function page (src) {
    window.location = src;
  }
  </script>

  <?php 
  include ('script.php');
  include ('footer.php');
  ?>

</body>

</html>
