<?php
// Check if confirmation is received
if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Include required files
    include 'dbcon.php';
    
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
    // Use JavaScript confirmation dialog instead of HTML page
    include 'head.php';
    include 'script.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <script>
        if(confirm("Are you sure you want to logout from the system?")) {
            window.location.href = "logout.php?confirm=yes";
        } else {
            history.back();
        }
    </script>
</body>
</html>
<?php
}
?>