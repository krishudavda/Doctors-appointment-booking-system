  <?php
include('connection.php');
class Show_patient_details extends Connection
{
	
	function get_patient_details()
	{
		$show_id = $_GET['show_id'];

		$query_show_patient = " SELECT * FROM `patient_info` WHERE `patient_id` = '$show_id' ";

		$query_get_patient = mysqli_query($this->con,$query_show_patient);
		if (mysqli_num_rows($query_get_patient) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_patient))
               {?>
                                   <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Patient id</label>
                                    <input class="form-control" type="text" name="patient_id " id="patient_id " value="<?php echo $row['patient_id']; ?>" readonly>
                                </div>
                                <div>
                                    <i class="fa fa-user icon"></i>&nbsp<label>Patient Name</label>
                                    <input class="form-control" type="text" name="patient_name" id="patient_name" value="<?php echo $row['patient_name']; ?>" readonly>
                                </div>

                                <div style="width: 300px; height: 100px; display: inline-block;">
                                   <i class="fas fa-calendar-alt"></i>&nbsp<label>Patient Birthdate</label>
                                     <input class="form-control" type="text" name="patient_birthdate" id="patient_birthdate" value="<?php echo $row['patient_birthdate']; ?>" readonly>

                                </div>
                                <div style="width: 300px; height: 100px; display: inline-block;">
                                   <i class="fas fa-transgender-alt"></i>&nbsp<label>Patient Gender</label>
                                   <input class="form-control" type="text" name="patient_gender" id="patient_gender" value="<?php echo $row['patient_gender']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-user-circle"></i>&nbsp<label>Patient Gardian Name</label>
                                    <input class="form-control" type="text" id="patient_gardian_name" name="patient_gardian_name" value="<?php echo $row['patient_gardian_name']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                     <i class="fas fa-phone"></i>&nbsp<label>Patient Contact No.</label>
                                    <input class="form-control" type="text" id="patient_contact" name="patient_contact" value="<?php echo $row['patient_contact']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                       <i class="fas fa-envelope-open"></i>&nbsp<label>Patient Email</label>
                                    <input class="form-control" type="text" id="patient_email" name="patient_email" value="<?php echo $row['patient_email']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                    <i class="fas fa-warehouse"></i>&nbsp<label>Patient City</label>
                                    <input class="form-control" type="text" id="patient_city" name="patient_city" value="<?php echo $row['patient_city']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                     <i class="fas fa-tint"></i>&nbsp<label>Patient Blood Group</label>
                                    <input class="form-control" type="text" id="patient_blood_group" name="patient_blood_group" value="<?php echo $row['patient_blood_group']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-briefcase"></i>&nbsp<label>Patient Occupation</label>
                                    <input class="form-control" type="text" id="patient_occupation" name="patient_occupation" value="<?php echo $row['patient_occupation']; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-key"></i>&nbsp<label>Patient Password</label>
                                    <input class="form-control" type="text" id="patient_password" name="patient_password" value="<?php echo $row['patient_password']; ?>" readonly>
                                </div>
                                 
               <?php
               }
           
           }
	}
}
$show_lab = new Show_patient_details();
$show_lab -> get_patient_details();



?>