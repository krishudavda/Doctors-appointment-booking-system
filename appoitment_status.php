<?php
    session_start();
    if (isset($_SESSION['patient_id']))
    {
        ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Appoitment Status</title>
</head>
<body>
    <?php
        include('header.php');
    ?>
<main>
  <div style="background-color: lightblue; opacity: 1.6;">
    <center><h1>View Appoitment Status</h1></center>
  </div><br><br>
    <div class="team-area section-padding10" id="doctors">
        <div class="container">
            <table class="table table-striprd table-hover table-bordered">
                <thead style="font-size: 20px;">
                    <tr class="table-success">
                        <th>#</th>
                        <th>Doctor Name</th>
                        <th>Doctor Fees</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px;">
                    <?php
                       include('../modal/get_appoitment_status.php');
                                                 
                    ?>
                </tbody>
            </table>
        </div>
    </div>    
    </main>
    

   <?php
        include('footer.php');
    ?>
    
    </body>
</html>
<?php
    }
    else
    {
        header("Location:logIn.php");
    }
?>