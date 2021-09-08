<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
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
    <div class="container">
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                    <div> <h3>Appointment Booking System </h3></div>
            </div>
        </aside>
        <header class="header-desktop">
            <h3 style="font-family: cursive;"><br>
                <center>Registration</center> 
            </h3>
        </header>

        <div class="card mx-auto" style="width: 30rem; margin-top: 100px">
              <div class="card-body">
                <form action="#" id="Registration_doctor_form" onsubmit="return false">
                                <div class="form-group">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Name</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Doctor Name">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-envelope-open"></i>&nbsp<label>Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-phone"></i>&nbsp<label>Mobile Number </label>
                                    <input class="form-control" type="text" id="mobile" name="mobile" placeholder="10 Digit Mobile Number">
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-key"></i>&nbsp<label>Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                                </div>
                                <div>
                                    <i class="fas fa-key"></i>&nbsp<label>Confirm Password</label>
                                    <input class="form-control" type="password" id="conf_password" name="conf_password" placeholder="Confirm Password">
                                    <p id="pass_error"></p>
                                </div><br>
                                <input type="submit" name="btn_register" id="btn_register" value="Register" class="btn btn-primary">
                                <p id="error"></p>
                            </form>
                  
                            <div class="register-link">
                                Already have account?
                                <a href="login.php">Sign In</a>
                            </div>
              </div>
        </div>
        
    </div>

    <script type="text/javascript">
       $('#btn_register').click(function(){

        $('#error').html("");
        $('#pass_error').html("");

            var name = $('#name').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var password = $('#password').val();
            var conf_password = $('#conf_password').val();

            $uppercase = password.match(/[A-Z]/);
            $lowercase = password.match(/[a-z]/);
            $number    = password.match(/[0-9]/);
            var password_length = $.trim(password).length;

    
            if (name != '' && email != '' && mobile != '' && password != '' && conf_password != '') 
            {
                if($uppercase && $lowercase && $number && password_length >= 8) 
                {
                    if (password == conf_password) 
                    {
                         $.ajax({
                        url : '../modal/register_doctor.php',
                        method : 'post',
                        data : $("#Registration_doctor_form input").serialize(),
                            success : function(response,status)
                            {
                                if (response == 1) 
                                 {
                                    window.location = 'login.php';
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
                         $('#pass_error').html("Password And Confirm Password Is not Match").css("color","red");
                    }
                   
                }
                else
                {
                    $('#pass_error').html("Please Set strong Password ").css("color","red");
                }
            }
            else
            {
               $('#error').html("Blank Field Is not Allowd").css("color","red"); 
            }
 
        });

    </script>

</body>
</html>