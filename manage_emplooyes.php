<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Employees</title>
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
                 <center><h3> Manage Employees </h3></center>
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
                                    <button class="btn btn-primary" id="btn_add_emp"><i class="fa fa-plus"> &nbsp Add Employee</i></button>
                                </div><br>
                                <h2 class="title-1 m-b-25">Employees</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-striprd table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Doctor ID</th>
                                                <th>Doctor Name</th>
                                                <th>Doctor Department</th>
                                                <th>Doctor designation</th>
                                                <th>Doctor Email</th>
                                                <th>Doctor Mobile No.</th>
                                                <th>Doctor Location</th>
                                                <th>Doctor Consulting Fees</th>
                                                <th colspan="2"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../modal/get_employee.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                    </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container" id="add_emp">
                      <form action="#" id="Registration_form" onsubmit="return false">
                                <div class="form-group">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Employee Name</label>
                                    <input class="form-control" type="text" name="Employee Name" id="emp_name" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-building"></i>&nbsp<label>Employee Department</label>
                                     <select class="form-control" id="emp_dept">
                                      <option>Please Select Anyone</option>
                                      <?php
                                        include('../modal/get_dept_add_emp.php');
                                      ?>
                                   </select>
                                </div>
                                <div class="form-group">
                                   <i class="fas fa-briefcase"></i>&nbsp<label>Employee Designation </label>
                                   <select class="form-control" id="emp_designation">
                                      <option>Please Select Anyone</option>
                                      <option>Senior Doctor</option>
                                      <option>Junior Doctor</option>
                                      <option>Receptionist</option>

                                   </select> 
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Employee Location</label>
                                    <input class="form-control" type="text" id="emp_loc" name="emp_loc" placeholder="Employee Location">
                                </div>

                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Employee Email</label>
                                    <input class="form-control" type="text" id="emp_email" name="emp_email" placeholder="Employee Email">
                                </div>

                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Employee Mobile</label>
                                    <input class="form-control" type="text" id="emp_mobile" name="emp_mobile" placeholder="Employee Mobile">
                                </div>

                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Employee Password</label>
                                    <input class="form-control" type="password" id="emp_pass" name="emp_pass" placeholder="Employee Password">
                                </div>

                                 <p id="error"></p><br>
                                <input type="submit" name="submit_add_emp" id="submit_add_emp" value="Save Employee" class="btn btn-primary">
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
          document.getElementById("add_emp").style.display = "none";
        }
        $('#add_emp').hide();

        $('#btn_add_emp').click(function(){
               $('#add_emp').show();
        });

        $('#submit_add_emp').click(function(){
            var emp_name = $('#emp_name').val();
            var emp_dept = $('#emp_dept').val();
            var emp_designation = $('#emp_designation').val();
            var emp_loc = $('#emp_loc').val();
            var emp_email = $('#emp_email').val();
            var emp_mobile = $('#emp_mobile').val();
            var emp_pass = $('#emp_pass').val();

            if (emp_name != '' && emp_loc != '' && emp_email != '' && emp_mobile != '' && emp_pass != '') 
            {
                if (emp_dept != 'Please Select Anyone' && emp_designation != 'Please Select Anyone'){
                        $.ajax({
                            url : '../modal/add_emp.php',
                            method : 'post',
                            data : {
                                emp_name : emp_name,
                                emp_dept : emp_dept,
                                emp_designation : emp_designation,
                                emp_loc :emp_loc,
                                emp_email : emp_email,
                                emp_mobile :emp_mobile,
                                emp_pass : emp_pass
                            },
                              success: function(data,status)
                                {
                                    if (data == 1) 
                                    {
                                        $('#add_emp').hide();
                                        window.location = 'manage_emplooyes.php';
                                    }
                                }
                        });
                    }
                    else
                    {
                        $('#error').html('Please Select Anyone').css("color","red");
                    }
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