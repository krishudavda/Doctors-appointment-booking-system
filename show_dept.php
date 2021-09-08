<?php
include('connection.php');
class Manage_dept_details extends Connection
{
	
	function get_dept()
	{
		if (isset($_GET['edit_id'])) {
			$edit_id = $_GET['edit_id'];

	   $get_depts = "SELECT * FROM `department` WHERE `dept_id`='$edit_id' ";    
       $query_get_depts = mysqli_query($this->con,$get_depts);
	         while ($row = mysqli_fetch_array($query_get_depts))
               {?>

               		<form action="#" id="update_form" onsubmit="return false">

                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Department ID</label>
                            <input class="form-control" type="text" name="dept_id" id="dept_id" value="<?php echo $row['dept_id']; ?>" readonly>
                        </div>
                         <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Department Name</label>
                            <input class="form-control" type="text" name="dept_name" id="dept_name" placeholder="Department Name" value="<?php echo $row['dept_name'];?>">
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                <input type="submit" name="btn_upd_dept" id="btn_upd_dept" value="Update Department" class="btn btn-primary">
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