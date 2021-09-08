<?php
include('connection.php');
class Manage_dept_details extends Connection
{
	
	function get_dept()
	{
		if (isset($_GET['show_id'])) 
        {
			$show_id = $_GET['show_id'];

    	   $get_service = "SELECT * FROM `services_list` WHERE `service_id`='$show_id' ";    
           $query_get_service = mysqli_query($this->con,$get_service);
	         while ($row = mysqli_fetch_array($query_get_service))
               {?>

               		<form action="#" id="update_form" onsubmit="return false">

                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Service ID</label>
                            <input class="form-control" type="text" name="service_id" id="service_id" value="<?php echo $row['service_id']; ?>" readonly>
                        </div>
                         <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Service Name</label>
                            <input class="form-control" type="text" name="service_name" id="service_name" placeholder="Department Name" value="<?php echo $row['service_name'];?>">
                        </div>
                        <div class="form-group">
                        <i class="fas fa-building"></i>&nbsp<label>Service Department</label>
                            <select class="form-control" id="service_department" name="service_department">
                            <option value="<?php echo $row['service_department']; ?>"><?php echo $row['service_department']; ?></option>
                            <?php
                                      
                            include('../modal/get_dept_add_emp.php');
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Service Rate</label>
                            <input class="form-control" type="text" name="service_price" id="service_price" value="<?php echo $row['service_price']; ?>">
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                <input type="submit" name="btn_upd_service" id="btn_upd_service" value="Save Changes" class="btn btn-primary">
                            </button>      
                        </div> 
                        </form>   

               	<?php
               }
        	} 
		}	
}
$manage_labs = new Manage_dept_details();
$manage_labs -> get_dept();

?>