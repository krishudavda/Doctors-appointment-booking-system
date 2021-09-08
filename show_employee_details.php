<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Employee Details</title>
	<style>
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
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> <br>Manage Employee Details </h3></center>
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

            <div class="main-content">
                <div class="section__content section__content--p30">
                      <div class="row">
                            <div class="container" id="add_center_div">
                      <form action="#" onsubmit="return false">
                      	<?php
                      		include('../modal/show_employee.php'); 
                      	?>    
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
    		var emp_dept = $('#emp_dept').val();
    		var emp_designation = $('#emp_designation').val();
    		var emp_loc = $('#emp_loc').val();
       var emp_email = $('#emp_email').val();
       var emp_mobile = $('#emp_mobile').val();
       var emp_pass = $('#emp_pass').val();
       var emp_fees = $('#emp_fees').val(); 


    		if (emp_name != '' && emp_dept != '' && emp_designation != '' && emp_loc != '' && emp_email != '' && emp_mobile != '' && emp_pass != '' && emp_fees != '') 
    		{
    			$.ajax({
    				url : '../modal/manage_employee.php',
    				method : 'POST',
    				data : {
              emp_id : emp_id,
    					emp_name : emp_name,
    					emp_dept : emp_dept,
    					emp_designation : emp_designation,
    					emp_loc : emp_loc,
              emp_email : emp_email,
              emp_mobile : emp_mobile,
              emp_pass : emp_pass,
              emp_fees : emp_fees
    				},
    				success : function(data,status)
    				{
    					if (data == 1) 
    					{
    						window.location = 'manage_emplooyes.php';
    					}
    				}
    			});
    		}
        else
        {
          $('#error').html("Blank Fields").show().css("color","red");
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