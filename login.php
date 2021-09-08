<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Doctor/Lab Login</title>

    <!-- Main CSS--> 
<link href="css/theme.css" rel="stylesheet" media="all">
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="animsition">
   <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                    <div> <h3>Appointment Booking System </h3></div>
            </div>
            <div style="background-color: lightgrey; opacity: 0.6;">
                    <center><h4>Doctor/Lab Panel</h4></center> 
            </div>
        </aside>
        <header class="header-desktop">
            <h3 style="font-family: cursive;">
                <center>Doctor/Lab Log-In </center> 
            </h3>
        </header>

         <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 200px; margin-left: 100px;">
                            <form action="#" id="login_form" onsubmit="return false">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="au-input au-input--full" type="email" id="email" name="email" placeholder="Example@domain.com">
                                </div><br>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password" placeholder="Password">
                                </div><br>
                                <div>
                                    <p id="error"></p>
                                </div>
                                <div class="login-checkbox">
                                        <a href="reset_pass_doctor.php">Forgotten Password?</a>
                                </div><br>
                                <input type="submit" name="btn_log_in" id="btn_log_in" value="Login" class="au-btn au-btn--block au-btn--green m-b-20">
                            </form>
                            <!-- <div class="register-link">
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script type="text/javascript">
    $('#btn_log_in').click(function(){

    $('#error').html("");
    var email = $('#email').val();
    var password = $('#password').val();

    if (email != '' && password != '') 
    {
        $.ajax({
        url : '../modal/login_verify.php',
        method : 'post',
        data : $("#login_form input").serialize(),

        success : function(response,status)
        {
             if (response == 1) 
             {
                window.location = 'index.php';
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
        $('#error').html("UserName Or Password Is blank").css("color","red");
    }

    });
    

</script>
</html>