<?php
include 'connection.php';
class Fetch_doctor_info extends Connection
{
   function get_doctor_info() 
   {
   $doctor_id = $_GET['doctor_id'];
   $get_doctor = "SELECT * FROM `employee` WHERE `emp_id`='$doctor_id' ";
       
       $query_get_doctor = mysqli_query($this->con,$get_doctor);

           
           if (mysqli_num_rows($query_get_doctor) > 0) 
           {
               while ($row = mysqli_fetch_array($query_get_doctor))
               {
                $dept = $row['dept_id'];
                   $get_dept = " SELECT `dept_name` FROM `department` WHERE `dept_id`='$dept' ";
                   $query_get_dept = mysqli_query($this->con,$get_dept);
                   $rows = mysqli_fetch_array($query_get_dept);
                ?>
                <input type="hidden" name="doc_name" value="<?php echo $row['emp_name']; ?>">
                <input type="hidden" name="doc_fees" value="<?php echo $row['Concultting_fees'];  ?>">
                                <div class="form-box email-icon mb-30">
                                    <label>Doctor ID :</label>
                                        <input type="text" name="doctor_id" id="doctor_id" value="<?php echo $row['emp_id']; ?>" readonly>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box subject-icon mb-30">
                                          <label>Doctor Name :</label>
                                        <input type="text" name="name" placeholder="ENTER YOUR FULL NAME" value="<?php echo $row['emp_name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                          <label>Doctor department:</label>
                                        <input type="text" id="dept" name="dept"
                                           value="<?php echo $rows['dept_name']; ?>" readonly>
                                           
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                          <label>Doctor Desigation :</label>
                                        <input type="text" id="desigation" name="desigation"
                                           value="<?php echo $row['emp_desigation']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-box subject-icon mb-30">
                                          <label>Doctor Location :</label>
                                        <input class="input--style-1" type="text" name="emp_address" value="<?php echo $row['emp_address'];  ?>" readonly> 
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <label>Doctor Contact Number :</label>
                                        <input class="input--style-1" type="text" placeholder="Contact number" name="contact_no" value="<?php echo $row['emp_mobile'];  ?>"readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <label>Doctor Email :</label>
                                        <input class="input--style-1" type="text" placeholder="E-mail" name="email" value="<?php echo $row['emp_email'];  ?>"readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box subject-icon mb-30">
                                        <label>Doctor Fees :</label>
                                        <input class="input--style-1" type="text" placeholder="E-mail" name="fees" value="<?php echo $row['Concultting_fees']." ₹ ";  ?>"readonly>
                                    </div>
                                </div>
                                <div class="submit-info">
                                    <button class="btn" type="submit" name="btn_book" >Book An Appoitment <i class="ti-arrow-right"></i> </button>
                                </div>
                                 
               <?php
               }
           
           }
       
       }
   
   }
   
   $add = new Fetch_doctor_info();
   $add -> get_doctor_info();                           
?>