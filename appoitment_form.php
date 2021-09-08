<?php
    session_start();
    if (isset($_SESSION['patient_id']))
    {
        ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Appointment Booking Form</title>
   <link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css"> 
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        include('header.php');
    ?>
<main>
	 <div style="background-color: lightblue; opacity: 1.6;">
    <center><h1>Book An Appointment</h1></center> 
  </div><br><br>
  <div class="contact-form-main" id="Appointment_form">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Appointment Booking Form</span>
                                        <h2>Appointment Form</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" onsubmit="return false">
                            <div class="row" style="font-size: 20px;">

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="patient_id" id="patient_id" value="<?php echo $_SESSION['patient_id']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                   <input type="text" name="name" id="patient_name" placeholder="Name" value=" <?php echo $_SESSION['patient_name'];?> " readonly>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="email" name="patient_email" id="patient_email" placeholder="email" value="<?php echo $_SESSION['patient_email']; ?>">
                                    </div>
                                </div>
                                 <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="patient_mobile" id="patient_mobile" placeholder="Phone" value="<?php echo $_SESSION['patient_contact']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="select" id="doctor_name">
                                            <option>Consulting Doctor</option>
                                            <?php
                                                include('../modal/dropdown_service.php');
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                         <input type="text" name="doctor_rate" id="doctor_rate" placeholder="Doctor's Fees" readonly="">
                                    </div>
                                </div>
                               <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" id="date" placeholder="Appoitment Date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <select name="select" id="time">
                                            <option> Appoitment Time</option>
                                            <?php
                                                include('../modal/timming_service.php');
                                            ?>
                                        </select>
                                </div><br><br><br><br><br><br>
                                 <div class="submit-info">
                                        <button class="btn" type="submit" id="book_appoitment">Book Appoitment Now <i class="ti-arrow-right"></i> </button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/img/gallery/contact_form.png" alt="">
        </div>
    </div>


</main>
    <?php
        include('footer.php');
    ?>
    <script src="js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#date').datepicker({
                dateFormat:"dd-mm-yy",
                changeMonth : true,
                changeYear : true,
                minDate: 0,
                maxDate: '+14D',
                beforeShow: function(){    
           $(".ui-datepicker").css('font-size', 18)
    }

        });
        });
    </script>
    <script type="text/javascript">
         $('#doctor_name').change(function(){
            var doctor_name = $('#doctor_name').val();
            if (doctor_name != 'Concultting Doctor') 
            {
                $.ajax({
                    url : '../modal/appoitment_operation.php',
                    method : 'post',
                    data : {
                        doctor_name : doctor_name
                    },
                     success : function(response,status)
                    {
                      $('#doctor_rate').val(response);
                    }
                });
            }
        });
         $('#book_appoitment').click(function(){

            var patient_id = $('#patient_id').val();
            var patient_name = $('#patient_name').val();
            var patient_mobile = $('#patient_mobile').val();
            var patient_email = $('#patient_email').val();
            var doctor_name = $('#doctor_name').val();
            var doctor_rate = $('#doctor_rate').val();
            var date = $('#date').val();
            var currentYear = (new Date).getFullYear();
            var sub_string = date.substring(8);
            var date_substring = date.replace(currentYear,sub_string);
            var time = $('#time').val();
           
           if (patient_mobile != '' && doctor_name != "Concultting Doctor" && date != '' && time != '') 
           {
                $.ajax({
                    url : '../modal/book_appoitment.php',
                    method : 'post',
                    data : {
                        patient_id : patient_id,
                        patient_name : patient_name,
                        patient_mobile : patient_mobile,
                        patient_email : patient_email,
                        doctor_name : doctor_name,
                        doctor_rate : doctor_rate,
                        date : date_substring,
                        time : time
                    },
                    success : function(data,status)
                    {
                        if (data == 1) 
                         {
                            location.href = "../modal/get_fees_details.php?patient_id=" + patient_id;
                         }
                         else
                         {
                             swal("SORRY!", data ,'error');
                         }
                        
                    }
                });
           }
           else
           {
                swal("OOPS!", "Please Fill All Fields" ,'warning');
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