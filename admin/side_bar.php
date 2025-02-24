<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    
    <!-- Add any other CSS files or stylesheets you need -->
    <link rel="stylesheet" href="path_to_your_custom_styles.css">

    <!-- Add Bootstrap CSS if you need it -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional: Include jQuery and Bootstrap JS if required -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Your existing code starts here -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; background-color:#0022ff;">
        <div class="navbar-header">
            <a class="navbar-brand" href="" style="color:white;">
                <i class="fa fa-home fa-lg"></i> HOME | Admin Portal
            </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <?php 
            require 'dbcon.php';
            $query = $conn->query("SELECT * from user where user_id ='$session_id'") or die(mysql_error());

            while ($row = $query->fetch_array()) { 
            ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white">
                        <i>Welcome: <?php echo $user_username = $user_row['firstname']." ".$user_row['lastname'];?></i>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <!-- Sidebar Menu Items -->
                    <li>
                        <a href="#"><i class="fa fa-bars fa-fw"></i> Menu</a>
                    </li>
                    <li>
                        <a href="candidate.php"><i class="fa fa-user fa-fw"></i> View Candidates</a>
                    </li>
                    <li>
                        <a href="voters.php"><i class="fa fa-users fa-fw"></i> View Voters</a>
                    </li>
                    <li>
                        <a href="current_students.php"><i class="fa fa-graduation-cap fa-fw"></i> Students</a>
                    </li>
                    <li>
                        <a href="canvassing.php"><i class="fa fa-download fa-fw"></i> Election Reports</a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-users fa-fw"></i> View User</a>
                    </li>
                    <li>
                        <a href="login_times.php"><i class="fa fa-clock fa-fw"></i> User Login Time</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out-alt fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Optionally, include custom JS or other scripts below -->
</body>
</html>
