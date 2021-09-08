<?php
    session_start();
    if (isset($_SESSION['patient_id']))
    {
        ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Send Enquirie</title>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        include('header.php');
    ?>
<main>
  <div style="background-color: lightblue; opacity: 1.6;">
    <center><h1>Send Enquirie</h1></center> 
  </div><br><br>
     <div class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Send Enquirie</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->

                        <form id="contact-form" onsubmit="return false">
                            <div class="row" style="font-size: 20px;">
                                <div class="col-lg-12">
                                    <div class="form-box email-icon mb-30">
                                        <label>Patient ID :</label>
                                            <input type="text" name="patient_id" id="patient_id" value="<?php echo $_SESSION['patient_id']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                          <label>Patient Name :</label>
                                        <input type="text" name="name" id="name" placeholder="ENTER YOUR FULL NAME" value="<?php echo $_SESSION['patient_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <label>Patient Contact Number :</label>
                                        <input class="input--style-1" type="text" placeholder="Contact number" name="contact_no" id="contact_no" value="<?php echo $_SESSION['patient_contact'];  ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box email-icon mb-30">
                                        <label>Email :</label>
                                            <input type="text" name="email" id="email" value="<?php echo $_SESSION['patient_email']; ?>" >
                                    </div>
                                </div> 
                                 <div class="col-lg-12">
                                    <div class="form-box email-icon mb-30">
                                        <label>Enquire :</label>
                                            <input type="text" name="enquire" id="enquire" placeholder="Please Enter Your Enquire">
                                    </div>
                                </div> 
                            </div>
                            <center><div class="col-lg-12">
                                        <button class="btn" type="submit" id="send_enquirie">Send Enquirie <i class="ti-arrow-right"></i> </button>
                                </div>
                            </center>
                        </form>
                        <p id="error_msg"></p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    
    </main>
    <?php
        include('footer.php');
    ?>

    <script type="text/javascript">
        

        $('#send_enquirie').click(function(){

        var patient_id = $('#patient_id').val();
        var name = $('#name').val();
        var contact_no = $('#contact_no').val();
        var email = $('#email').val();
        var enquire = $('#enquire').val();

        if (name != '' && contact_no != '' && email != '' && enquire != '')  
        {
                 $.ajax({
                    url : "../modal/sent_enquire.php",
                    method : "post",
                    data : {
                        patient_id : patient_id,
                        name : name,
                        contact_no : contact_no,
                        email : email,
                        enquire : enquire
                    },

                    success: function(data,status)
                    {
                        alert(data);
                        if (data == 1) 
                        {
                            swal({
                              title: "Enquirie Has Sent !!!",
                              text: "Your Enquirie Has Sent successfully",
                              icon: "success",
                              button: true,
                            })
                            .then((willredirect) => {
                              if (willredirect) {
                                window.location = 'index.php';
                              }
                            });
                        }
                        
                    }

                });

        }
        else
        {
            $('#error_msg').html("Empty Fields Is not Valid").css("color","red");
        }
            
        });
    </script>

    
    
    </body>
</html>
<?php
    }
    else
    {
        header("Location:logIn.php");
    }
?>