<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Service</title>
	<style type="text/css">
    div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-top: 50px;
  padding: 20px;
}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
  </style>
</head>
<body>

	<div class="page-wrapper">


        <?php
        session_start();
            include('../View/header.php');
        ?>


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Manage Service </h3></center>
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
                    <div class="row">     
                    </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container">
                         <?php
                            include('../modal/show_service.php');
                         ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                                
                    </div>
                </div>
            </div>
        </div>
            
        </div>

          <script type="text/javascript">
        $('#btn_upd_service').click(function(){   
            var service_id = $('#service_id').val();
            var service_name = $('#service_name').val();
            var service_department = $('#service_department').val();
            var service_price = $('#service_price').val();
            

            if (service_name != '' && service_department != '' && service_price != '') 
            {
                $.ajax({
                    url : '../modal/manage_services.php',
                    method : 'POST',
                    data : {
                        service_id : service_id,
                        service_name : service_name,
                        service_department : service_department,
                        service_price : service_price
                    },
                    success : function(data,status)
                    {
                        if (data == 1) 
                        {
                            window.location = 'manage_services.php';
                        }
                    }
                });
            }
        });
    </script> 
 <?php
include('footer.html');

?>
<?php
    }
    else
    {
        header("Location:login.php");
    }
?>
</body>
</html>