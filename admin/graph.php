<?php include ('session.php');?>
<?php include ('head.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Election Results</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div id="wrapper">

<!-- Navigation -->
<?php include ('side_bar.php');?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            
            
        </div>
        
        
        <hr/>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class = "alert alert-success">Election Report</h4>	
                </div>
                
            <br/>
               <form method="post" action="sort.php">
    

       

<?php
require 'dbcon.php';

// Array to store candidate names and their total votes, grouped by position
$positions = array();

$query = $conn->query("SELECT * FROM candidate");
while($fetch = $query->fetch_array())
{
    $id = $fetch['candidate_id'];
    $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
    $fetch1 = $query1->fetch_assoc();

    // Group candidates by position
    $positions[$fetch['position']][] = array(
        'name' => $fetch['firstname'] . " " . $fetch['lastname'],
        'total' => $fetch1['total']
    );
}
?>

<div style="width: 800px; margin: 0 auto;">
<a href="canvassing.php"><button type="button" style = "margin-right:14px;"> Back</button></a>
    <?php foreach ($positions as $position => $candidates): ?>
        <h3><?php echo $position; ?></h3>
        <canvas id="myChart-<?php echo str_replace(' ', '-', strtolower($position)); ?>"></canvas>
        <br>
    <?php endforeach; ?>
</div>

<?php foreach ($positions as $position => $candidates): ?>
    <script>
        // Extract candidate names and vote counts for the current position
        var candidateNames_<?php echo str_replace(' ', '_', strtolower($position)); ?> = <?php echo json_encode(array_column($candidates, 'name')); ?>;
        var voteCounts_<?php echo str_replace(' ', '_', strtolower($position)); ?> = <?php echo json_encode(array_column($candidates, 'total')); ?>;

        var ctx_<?php echo str_replace(' ', '_', strtolower($position)); ?> = document.getElementById('myChart-<?php echo str_replace(' ', '-', strtolower($position)); ?>').getContext('2d');
        var myChart_<?php echo str_replace(' ', '_', strtolower($position)); ?> = new Chart(ctx_<?php echo str_replace(' ', '_', strtolower($position)); ?>, {
            type: 'bar',
            data: {
                labels: candidateNames_<?php echo str_replace(' ', '_', strtolower($position)); ?>,
                datasets: [{
                    label: 'Votes',
                    data: voteCounts_<?php echo str_replace(' ', '_', strtolower($position)); ?>,
                    backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(54, 162, 235, 0.5)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php endforeach; ?>

</body>
</html>
