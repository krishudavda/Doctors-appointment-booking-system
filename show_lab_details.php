<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Lab Details</title>
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
                 <center><h3> <br>Manage Lab Details </h3></center>
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
                      		include('../modal/show_lab.php'); 
                      	?>    
                      	<p id="error"></p><br>
                        <input type="submit" name="submit_upd_center" id="submit_upd_center" value="Update Center Details" class="btn btn-primary">               
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
    	$('#submit_upd_center').click(function(){	
    		var center_id = $('#center_id').val();
    		var center_name = $('#center_name').val();
    		var center_type = $('#center_type').val();
    		var center_head = $('#center_head').val();
    		var center_loc = $('#center_loc').val();

    		if (center_id != '' && center_name != '' && center_type != '' && center_head != '' && center_loc != '') 
    		{
    			$.ajax({
    				url : '../modal/manage_labs.php',
    				method : 'POST',
    				data : {
    					center_id : center_id,
    					center_name : center_name,
    					center_type : center_type,
    					center_head : center_head,
    					center_loc : center_loc
    				},
    				success : function(data,status)
    				{
    					if (data == 1) 
    					{
    						$('#error').html("Records Update successfully").show().fadeOut(10000).css("color","green");
    						window.location = 'diagnostic_center.php';
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
?>
</body>
</html>