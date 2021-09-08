  <?php
include('connection.php');
class Show_employee_details extends Connection
{
	
	function get_employee_details()
	{
		$show_id = $_GET['show_id'];

		$query_show_emp = " SELECT * FROM `employee` WHERE `emp_id` = '$show_id' ";

		$query_get_emp = mysqli_query($this->con,$query_show_emp);
		if (mysqli_num_rows($query_get_emp) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_emp))
               {?>
                                   <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Doctor id</label>
                                    <input class="form-control" type="text" name="emp_id" id="emp_id" value="<?php echo $row['emp_id']; ?>" readonly>
                                </div>
                                <div>
                                    <i class="fa fa-user icon"></i>&nbsp<label>Doctor Name</label>
                                    <input class="form-control" type="text" name="emp_name" id="emp_name" value="<?php echo $row['emp_name']; ?>">
                                </div>

                                <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fas fa-building"></i>&nbsp<label>Doctor Department</label>
                                     <select class="form-control" id="emp_dept">
                                      <option selected><?php echo $row['dept_id']; ?></option>
                                      <?php
                                      
                                        include('../modal/get_dept_add_emp.php');
                                      ?>
                                   </select>
                                </div>
                                <div style="width: 300px; height: 100px; display: inline-block;">
                                   <i class="fas fa-briefcase"></i>&nbsp<label>Doctor Designation</label>
                                   <select class="form-control" id="emp_designation">
                                      <option selected><?php echo $row['emp_desigation']; ?></option>
                                      <option>Serior Doctor</option>
                                      <option>Junior Doctor</option>
                                      <option>Receptionist</option>
                                   </select> 
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Doctor Location</label>
                                    <input class="form-control" type="text" id="emp_loc" name="emp_loc" value="<?php echo $row['emp_address']; ?>">
                                </div>
                                 <div class="form-group">
                                     <i class="fas fa-envelope-open"></i>&nbsp<label>Doctor Email</label>
                                    <input class="form-control" type="text" id="emp_email" name="emp_email" value="<?php echo $row['emp_email']; ?>">
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-phone"></i>&nbsp<label>Doctor Mobile</label>
                                    <input class="form-control" type="text" id="emp_mobile" name="emp_mobile" value="<?php echo $row['emp_mobile']; ?>">
                                </div>
                                 <div class="form-group">
                                      <i class="fas fa-key"></i>&nbsp<label>Doctor Password</label>
                                    <input class="form-control" type="text" id="emp_pass" name="emp_pass" value="<?php echo $row['emp_password']; ?>">
                                </div>
                                <div class="form-group">
                                      <i class="fas fa-key"></i>&nbsp<label>Doctor Cosulting Fees</label>
                                    <input class="form-control" type="text" id="emp_fees" name="emp_fees" value="<?php echo $row['Concultting_fees']; ?>">
                                </div>
                                 
               <?php
               }
           
           }
	}
}
$show_lab = new Show_employee_details();
$show_lab -> get_employee_details();



?>