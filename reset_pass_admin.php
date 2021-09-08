<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password Admin</title>
<link href="css/theme.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                    <div> <h3>Appointment Booking System </h3></div>
            </div>
        </aside>

         <header class="header-desktop">
            <h3 style="font-family: cursive;">
                <center> Admin Forgot Password </center> 
            </h3>
        </header>

        <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 200px; margin-left: 100px;">
                            <form action="#" id="reset_pass_form" onsubmit="return false">
                                <div class="form-group">
                                    <label>Enter Registered Mobile Number</label>
                                    <input class="au-input au-input--full" type="Number" id="mobile" name="mobile" placeholder="Enter Registered Mobile Number"><br><br>
                                    <span><button class="btn au-btn--green" id="get_otp">Get OTP</button></span>
                                    <p id="otp_status"></p>
                                </div><br>
                                <div class="form-group">
                                    <label>Enter OTP</label>
                                    <input class="au-input au-input--full" type="text" id="otp" name="otp" placeholder="Enter OTP">
                                </div><br>
                                <div>
                                    <p id="error"></p>
                                </div>
                                <input type="submit" name="btn_reset" id="btn_reset" value="Procced" class="au-btn au-btn--block au-btn--green m-b-20">
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	$('#get_otp').click(function(){

    		var mobile = $('#mobile').val();
    		if (mobile.length == 10 && mobile != '') 
    		{
    			$.ajax({
    				url : '../modal/otp_controler.php',
    				method : 'post',
    				data : { 
    					mobile : mobile
    				},
    				success : function(response,status) 
    				{
                        // alert(response);
    					if (response == 1) 
			             {
			                $("#otp_status").html('OTP has Send successfull').css("color","green");
			             }
			             else
			             {
			                 $("#otp_status").html(response).css("color","red");
			             }
						
					}
    			});
    		}
    		else
    		{
    			$('#otp_status').html("Please Enter Valid Mobile Number").css("color","red");
    		}

    	});

    	$('#btn_reset').click(function(){

    		var otp = $('#otp').val();
    		if (otp != '') 
    		{
    			$.ajax({
    				url : '../modal/otp_controler.php',
    				method : 'post',
    				data : { 
    					otp : otp
    				},
    				success : function(response,status) 
    				{
						if (response == true) 
			             {
			                window.location = 'reset_pass.php';
			             }
			             else
			             {
			                 $('#error').html(response).css("color","red");
			             }
					}
    			});
    		}
    		else
    		{
    			$('#error').html("Please Enter Valid OTP").css("color","red");
    		}

    	});
    </script>

</body>
</html>