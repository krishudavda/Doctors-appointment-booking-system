<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title> Manage Time Schedule </title>
</head>
    <style type="text/css">
    div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-top: 50px;
  padding: 20px;
}

input[type=text],[type=time] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
  </style>
<body>
	 <div class="page-wrapper">


        <?php
        session_start();
            include('header.php');
        ?>


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Manage Time Schedule </h3></center>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="float-right">
                        <div class="header-wrap">
                            <div class="header-button">
                                
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'];  ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                    <h3 class="name">
                                                        <center><?php echo $_SESSION['username'];  ?></center>
                                                    </h3>
                                                   <center><span class="email"><?php echo $_SESSION['email'];  ?></span></center> 
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="manage_admin_account.php">
                                                        <i class="zmdi zmdi-account"></i> Manage Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="row" id="show_dept">
                        <div>
                            <div>
                                    <button class="btn btn-primary" id="show_times_form"><i class="fa fa-plus"> &nbsp Add Time</i></button>
                                </div><br>
                                <h2 class="title-1 m-b-25"> Time Schedule</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-striprd table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>start Time Schedule</th>
                                                <th>start End Schedule</th>
                                                <th colspan="2"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../modal/get_time.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>     
                    </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container" id="add_time">
                        <form action="#" id="update_form" onsubmit="return false">

                        <div class="input-field">
                            <label>Choose Start Time :</label>

                        <input type="time" id="start_time" name="start_time"
                               min="10:00" max="19:00" required>
                               <label>Choose End Time :</label>

                        <input type="time" id="end_time" name="end_time"
                               min="10:00" max="19:00" required>
                        </div>
                        <div>
                            <p id="error"> </p>
                                <input type="submit" name="btn_add_time" id="btn_add_time" value="Save Time" class="btn btn-primary">
                            <button class="btn btn-danger" onclick="closeForm()">Close</button>     
                        </div> 
                        </form>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                                
                    </div>
                </div>
            </div>
        </div>
            
        </div>

	<?php
		include('footer.html');
	?>

    <script type="text/javascript">
        function closeForm() 
        {
          document.getElementById("add_time").style.display = "none";
        }

        $('#add_time').hide();
        $('#show_times_form').click(function(){
            $('#add_time').show();
        });

        $('#btn_add_time').click(function(){
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();

            if (start_time != '' && end_time != '') 
            {   
                $.ajax({
                url : '../modal/add_time.php',
                method : 'post',
                data : {
                    start_time : start_time,
                    end_time : end_time
                },
                success : function(response,status)
                {
                  if (response == 1) 
                    {
                        $('#add_time').hide();
                        window.location = 'manage_timming.php';
                    }
                }
            });

            }
            else
            {
                $('#error').html("Please Select Valid Time").css('color','red');
            }
           
        });

    </script>
<?php
    }
    else
    {
        header("Location:login.php");
    }
?>
</body>
</html>