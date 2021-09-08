<?php
include('connection.php');
class Show_lab_detail extends Connection
{
	
	function get_lab_details()
	{
		$show_id = $_GET['show_id'];

		$query_show_lab = " SELECT * FROM `labs/centers` WHERE `lab_id` = '$show_id' ";

		$query_get_labs = mysqli_query($this->con,$query_show_lab);
		if (mysqli_num_rows($query_get_labs) > 0) 
           
           {
               while ($row = mysqli_fetch_array($query_get_labs))
               {?>
                                   <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fa fa-user icon"></i>&nbsp<label>Center id</label>
                                    <input class="form-control" type="text" name="center_id" id="center_id" value="<?php echo $row['lab_id']; ?>" readonly>
                                </div>
                                <div>
                                    <i class="fa fa-user icon"></i>&nbsp<label>Center Name</label>
                                    <input class="form-control" type="text" name="center_name" id="center_name" value="<?php echo $row['lab_name']; ?>">
                                </div>
                                <div style="width: 300px; height: 100px; display: inline-block;">
                                    <i class="fas fa-building"></i>&nbsp<label>Center Type</label>
                                     <select class="form-control" id="center_type">
                                      <option value="<?php echo $row['dept_id']; ?>" selected><?php echo $row['dept_id']; ?></option>
                                      <?php
                                      
                                        include('../modal/get_dept_add_emp.php');
                                      ?>
                                   </select>
                                </div>
                                <div style="width: 300px; height: 100px; display: inline-block;">
                                   <i class="fas fa-briefcase"></i>&nbsp<label>Center Head</label>
                                   <select class="form-control" id="center_head">
                                      <option value="<?php echo $row['emp_id']; ?>" selected><?php echo $row['emp_id']; ?></option>
                                      <?php
                                        include('../modal/get_emp.php');
                                      ?>
                                   </select> 
                                </div>
                                <div class="form-group">
                                     <i class="fas fa-map-marker-alt"></i>&nbsp<label>Center Location</label>
                                    <input class="form-control" type="text" id="center_loc" name="center_loc" value="<?php echo $row['lab_location']; ?>">
                                </div>
                                 
               <?php
               }
           
           }
	}
}
$show_lab = new Show_lab_detail();
$show_lab -> get_lab_details();



?>