<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title> Manage Departments </title>
</head>
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
        session_start();
            include('header.php');
        ?>


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Manage Departments </h3></center>
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
                                    <button class="btn btn-primary" id="add_dept"><i class="fa fa-plus"> &nbsp Add Department</i></button>
                                </div><br>
                                <h2 class="title-1 m-b-25">Departments</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-striprd table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Department ID</th>
                                                <th>Department Name</th>
                                                <th colspan="2"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('../modal/get_all_dept.php');
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>     
                    </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container" id="add-dept">
                        <form action="#" id="update_form" onsubmit="return false">

                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Department Name</label>
                            <input class="form-control" type="text" name="dept_name" id="dept_name" placeholder="Department Name">
                        </div>
                        <div>
                            <p id="error"></p>
                                <input type="submit" name="btn_add_dept" id="btn_add_dept" value="Save Department" class="btn btn-primary">
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
          document.getElementById("add-dept").style.display = "none";
        }

        $('#add-dept').hide();
        $('#add_dept').click(function(){
            $('#add-dept').show();
        });

        $('#btn_add_dept').click(function(){
            var dept_name = $('#dept_name').val();
            if (dept_name != '') 
            {
                $.ajax({
                url : '../modal/add_dept.php',
                method : 'post',
                data : {
                    dept_name : dept_name
                },
                success : function(response,status)
                {
                  if (response == 1) 
                    {
                        $('#add-dept').hide();
                        window.location = 'manage_Department.php';
                    }
                }
            });
            }
            else
            {
                $('#error').html("Please Enter Department Name").css("color","red");
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