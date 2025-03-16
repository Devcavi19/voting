<?php
// Check if confirmation is received
if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Include required files
    include('dbcon.php');
    
    // Start the session if not already started
    if(!isset($_SESSION)) {
        session_start();
    }
    
    // Store session ID before destroying
    $old_session_id = session_id();
    
    // Destroy the session
    session_destroy();
    unset($_SESSION);
    
    // Regenerate session ID for additional security
    session_start();
    session_regenerate_id(true);
    
    // Set logout success message
    $_SESSION['logout_msg'] = "You have been successfully logged out.";
    
    // Redirect to login page
    header('location: login.php');
    exit;
} else {
    // Show the confirmation page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout Confirmation</title>
    <?php include('head.php'); ?>
    <style>
        .logout-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn-container .btn {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logout-container">
            <h3>Logout Confirmation</h3>
            <p>Are you sure you want to logout from the system?</p>
            <div class="btn-container">
                <a href="logout.php?confirm=yes" class="btn btn-danger">Confirm</a>
                <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>
</html>
<?php
}
?>