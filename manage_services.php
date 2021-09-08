<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Services</title>
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
            include('header.php');
        ?>


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Manage Services </h3></center>
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
                          <div>
                                <div>
                                    <button class="btn btn-primary" id="btn_add_emp"><i class="fa fa-plus"> &nbsp Add Service</i></button>
                                </div><br>
                                <h2 class="title-1 m-b-25">Services</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-striprd table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service ID</th>
                                                <th>Service Name</th>
                                                <th>Service Department</th>
                                                <th>Service Rate</th>
                                                <th colspan="2"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../modal/get_services.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                    </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container" id="add_service">
                      <form action="#" id="" onsubmit="return false">
                                <div class="form-group">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Service Name</label>
                                    <input class="form-control" type="text" name="service_name" id="service_name" placeholder="Service Name">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-building"></i>&nbsp<label>Service Department</label>
                                     <select class="form-control" id="service_dept" name="service_dept">
                                      <option>Please Select Anyone</option>
                                      <?php
                                        include('../modal/get_dept_add_emp.php');
                                      ?>
                                   </select>
                                </div>
                                <div class="form-group">
                                   <i class="fas fa-rupee-sign"></i>&nbsp<label>Service Price</label>
                                    <input class="form-control" type="text" name="service_price" id="service_price" placeholder="Service Rate">
                                </div>
                                 <p id="error"></p><br>
                                <input type="submit" name="submit_add_service" id="submit_add_service" value="Save Service" class="btn btn-primary">
                                <button class="btn btn-danger" onclick="closeForm()">Close</button>
                               
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
          document.getElementById("add_service").style.display = "none";
        }
        $('#add_service').hide();

        $('#btn_add_emp').click(function(){
               $('#add_service').show();
        });

        $('#submit_add_service').click(function(){
            var service_name = $('#service_name').val();
            var service_dept = $('#service_dept').val();
            var service_price = $('#service_price').val();

            if (service_name != '' && service_dept != 'Please Select Anyone' && service_price != '') 
            {
                        $.ajax({
                            url : '../modal/add_service.php',
                            method : 'post',
                            data : {
                                service_name : service_name,
                                service_dept : service_dept,
                                service_price : service_price
                            },
                              success: function(data,status)
                                {
                                    if (data == 1) 
                                    {
                                        $('#add_service').hide();
                                        window.location = 'manage_services.php';
                                    }
                                }
                        });
            }
            else
            {
                $('#error').html('Empty Field').css("color","red");
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