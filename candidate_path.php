
<?php include ('head.php');?>

<body>

    <div id="wrapper">

      
              <?php include ('view_banner.php');?>
       
        <div id="page-wrapper">

    <heading class="menue-select">
            <center>
                <select onchange = "page(this.value)">
                <option disabled selected>Select Candidate Group</option>
                <option value = "candidates/pres.php">President</option>
                <option value = "candidates/vp.php">Vice President</option>
                <option value = "candidates/ua.php">Secretary</option>
                <option value = "candidates/ss.php">Assistant Secretary</option>
                <option value = "candidates/ea.php">Auditor</option>
                <option value = "candidates/tr.php">Treasurer</option>
                <option value = "candidates/vtr.php">PRO</option>
                <option value = "candidates/sg.php">Technical Director</option>
                <option value = "candidates/ta.php">Director for ACADS/option</option>
                <option value = "candidates/pb.php">Director for NON-ACADS</option>
                <option value = "candidates/ac.php">Committee on Layouts</option>
                </select>
            </center>

    </heading> 
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php    
        include ('footer.php');
        ?>

    <script>
    function page (src){
        window.location=src;
    }
    </script>

</body>

</html>

