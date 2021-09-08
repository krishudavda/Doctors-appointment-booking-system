<?php
    session_start();
    if (isset($_SESSION['emp_id'])) 
    {
?>
<!DOCTYPE html>
<html>
<title>Manage Account Details</title>
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
  <body>
    <div class="page-wrapper">
        <?php
            include('header.php');
        ?>
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Manage My Account Details </h3></center>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="float-right">
                        <div class="header-wrap">
                            <div class="header-button">
                                
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['emp_name'];  ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                    <h3 class="name">
                                                        <center><?php echo $_SESSION['emp_name'];  ?></center>
                                                    </h3>
                                                <center><span class="email"><?php echo $_SESSION['emp_email'];  ?></span></center> 
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

            <div class="main-content">
                <div class="section__content section__content--p30">
                      <div class="row">
                            <div class="container" id="add_center_div">
                      <form action="#" onsubmit="return false" id="update_form">
                        <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Employee id</label>
                                    <input class="form-control" type="text" name="emp_id" id="emp_id" value="<?php echo $_SESSION['emp_id']; ?>" readonly>
                                </div>
                                <div>
                                    <i class="fa fa-user icon"></i>&nbsp<label>Employee Name</label>
                                    <input class="form-control" type="text" name="emp_name" id="emp_name" value="<?php echo $_SESSION['emp_name']; ?>">
                                </div>

                                <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fas fa-building"></i>&nbsp<label>Employee Department</label>
                                   <input class="form-control" type="text" name="emp_dept" id="emp_dept" value="<?php echo $_SESSION['dept_id']; ?>" readonly>
                                </div>
                                <div style="width: 300px; height: 100px; display: inline-block;">
                                   <i class="fas fa-briefcase"></i>&nbsp<label>Employee Designation</label>
                                   <select class="form-control" id="emp_designation" readonly>
                                      <option selected><?php echo $_SESSION['emp_desigation']; ?></option>
                                   </select> 
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Employee Location</label>
                                    <input class="form-control" type="text" id="emp_loc" name="emp_loc" value="<?php echo $_SESSION['emp_address']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                     <i class="fas fa-envelope-open"></i>&nbsp<label>Employee Email</label>
                                    <input class="form-control" type="text" id="emp_email" name="emp_email" value="<?php echo $_SESSION['emp_email']; ?>">
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-phone"></i>&nbsp<label>Employee Mobile</label>
                                    <input class="form-control" type="text" id="emp_mobile" name="emp_mobile" value="<?php echo $_SESSION['emp_mobile']; ?>">
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-key"></i>&nbsp<label>Employee Password</label>
                                    <input class="form-control" type="text" id="emp_pass" name="emp_pass" value="<?php echo $_SESSION['emp_password']; ?>">
                                </div>   
                        <p id="error"></p><br>
                        <input type="submit" name="submit_upd_employee" id="submit_upd_employee" value="Update Employee Details" class="btn btn-primary">               
                      </form>       
                    </div>
                      </div>  
                </div>
                <div class="section__content section__content--p30"> 
                    <div class="row">     
                    </div>
                </div>
            </div>
      </div>
            
    </div>
    
 <script type="text/javascript">
        

        $('#submit_upd_employee').click(function(){
        var emp_id = $('#emp_id').val();
        var emp_name = $('#emp_name').val();
        var emp_email = $('#emp_email').val();
        var emp_mobile = $('#emp_mobile').val();
        var emp_pass = $('#emp_pass').val();

            $uppercase = emp_pass.match(/[A-Z]/);
            $lowercase = emp_pass.match(/[a-z]/);
            $number    = emp_pass.match(/[0-9]/);
            var password_length = $.trim(emp_pass).length;

        if (emp_name != '' && emp_email != '' && emp_mobile != '' && emp_pass != '' ) 
        {
            if ($uppercase && $lowercase && $number && password_length >= 8) 
             {
                 $.ajax({
                    url : "../modal/update_admin.php",
                    method : "post",
                    data : {
                      emp_id : emp_id,
                      emp_name : emp_name,
                      emp_email : emp_email,
                      emp_mobile : emp_mobile,
                      emp_pass : emp_pass




                    },

                    success: function(data,status)
                    {
                      if (data == 1) 
                      {
                         $('#error').html("Records Update successfully").show().fadeOut(10000).css("color","green");
                         window.location = 'index.php';
                         
                      }
                       
                    }

                });
             }
             else
             {
                $('#error').html("Password Shuold Be Stronger").css("color","red");
             }

        }
        else
        {
            $('#error').html("Empty Fields Is not Valid").css("color","red");
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