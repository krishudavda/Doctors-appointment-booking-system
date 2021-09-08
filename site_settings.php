<?php
    session_start();
    if (isset($_SESSION['register_id']))
    {
?>
<!DOCTYPE html>
<html>
<head>
	<title> Site Settings </title>

</head>
    <style type="text/css">
    div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-top: 50px;
  padding: 20px;
}

input[type=text][type=label] {
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
<!--www.geogroup.in
hrgdr@geogroup.in-->
	 <div class="page-wrapper">


        <?php
        session_start();
            include('header.php');
        ?>


        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                 <center><h3> Site Settings </h3></center>
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
                        <div class="container" id="account_verification">
                        <form action="#" id="update_form" onsubmit="return false">
                            <center><h3><b>Account Verification</b></h3></center>
                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Account Verification : </label>
                            <input class="form-control" type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
                        </div>
                        <div>
                            <p id="error"></p>
                                <input type="submit" name="verify_now" id="verify_now" value="Verify Now" class="btn btn-primary">   
                        </div> 
                        </form>    
                    </div><br><br>

                    <div class="container" id="">
                      <form action="#" onsubmit="return false">
                        <center><h3><b>SEO Settings</b></h3></center>
                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Title : </label>
                            <input class="form-control" type="text" name="title" id="title">

                            <i class="fas fa-hospital"></i>&nbsp<label>Description: </label>
                            <input class="form-control" type="text" name="description" id="description">
                            
                            <i class="fas fa-hospital"></i>&nbsp<label>Keywords : </label>
                            <input class="form-control" type="text" name="keywords" id="keywords">
                            
                            <i class="fas fa-hospital"></i>&nbsp<label>Author : </label>
                            <input class="form-control" type="text" name="author" id="author">
                        </div>
                        <p id="query"></p>
                        <div class="form-group">
                            <p id="error"></p>
                                <input type="submit" name="update_details" id="update_details" value="Update SEO" class="btn btn-primary">   
                        </div> 
                        </form> 
                    </div>
                    <div class="container">
                            <div class="form-group">
                               <center><h3><b> Site URL </b></h3></center>
                                <input class="form-control" type="label" name="site_url" id="site_url" value="http://localhost/ET%20Training/Appointment%20Booking%20System/Patient/view/index.php" readonly="">
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
            
        </div>

	<?php
		include('footer.html');
	?>

     <script type="text/javascript">
        $(document).ready(function(){
            var email = $('#email').val();
             $.ajax({
                url : '../modal/email_verification.php',
                method : 'post',
                data : {
                    email : email
                },
                success : function(response,status)
                {
                  if (response == 1) 
                    {
                        $('#email').css("background-color","#ddffdd").css({'border':'1px solid #ddffdd'});
                        $('#error').html("Your Email Is Verified....").css("color","green");

                    }
                    else
                    {
                        $('#email').css("background-color","#ffdddd").css({'border':'1px solid red'});
                        $('#error').html("Email Is Not Verified...!!!!").css("color","red");
                    }
                }
            });

             $.ajax({
                url : '../modal/seo_settings.php',
                method : 'post',
                data : {
                    action : 'get records'
                },
                success : function(get,status)
                {
                    var user = JSON.parse(get);
        
                    $('#title').val(user.title);
                    $('#description').val(user.description);
                    $('#keywords').val(user.keywords);
                    $('#author').val(user.author);
                }
            });
        });
        $('#verify_now').click(function(){
            var email = $('#email').val();
            if (email != '') 
            {
               $.ajax({
                url : '../modal/email_verification.php',
                method : 'post',
                data : {
                    verify_email : email
                },
                success : function(data,status)
                {
                  if (data == 1) 
                    {
                        alert("Verification Mail Sent SccessFully");

                    }
                    else
                    {
                        alert(data);
                    }
                }
            });
            }
            else
            {
                $('#error').html("Please Enter Department Name").css("color","red");
            }
            
        });

         $('#update_details').click(function(){
            var title = $('#title').val();
            var description = $('#description').val();
            var keywords = $('#keywords').val();
            var author = $('#author').val();

            if (title != '' && description != '' && keywords != '' && author != '') 
            {
               $.ajax({
                url : '../modal/seo_settings.php',
                method : 'post',
                data : {
                    title : title,
                    description : description,
                    keywords : keywords,
                    author : author
                },
                success : function(ans,status)
                {
                    if (ans == 1) 
                    {
                        $('#query').html("Records Update successfully").css("color","green");
                    }
                    else
                    {
                        $('#query').html(ans).css("color","red");
                    }
                }
            });
            }
            else
            {
                $('#query').html("Blank Fields").css("color","red");
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