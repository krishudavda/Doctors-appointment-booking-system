<?php
include('connection.php');
class Manage_time_details extends Connection
{
	
	function get_time()
	{
		if (isset($_GET['edit_id'])) {
			$edit_id = $_GET['edit_id'];

	   $query_time = "SELECT * FROM `timming_doctor` WHERE `time_id`='$edit_id' ";    
       $query_get_time = mysqli_query($this->con,$query_time);
	         while ($row = mysqli_fetch_array($query_get_time))
               {?>

               		<form action="#" id="update_form" onsubmit="return false">

                        <div class="form-group">
                            <i class="fas fa-hospital"></i>&nbsp<label>Time ID</label>
                            <input class="form-control" type="text" name="time_id" id="time_id" value="<?php echo $row['time_id']; ?>" readonly>
                        </div>
                         <div class="form-group">
                           <i class="fas fa-clock"></i>&nbsp<label>Edit Start Time:</label>
                          
                        <input type="time" id="start_time" name="start_time"
                               min="10:00" max="19:00" value="<?php echo $row['start_time']; ?>" required>
                        </div>

                        <div class="form-group">
                           <i class="fas fa-clock"></i>&nbsp<label>Edit End Time:</label>
                          
                        <input type="time" id="end_time" name="end_time"
                               min="10:00" max="19:00" value="<?php echo $row['end_time']; ?>" required>
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                <input type="submit" name="upd_time_btn" id="upd_time_btn" value="Save Time" class="btn btn-primary">
                            </button>      
                        </div> 
                        </form>   

               	<?php
               }
        	} 
		}	
}
$manage_labs = new Manage_time_details();
$manage_labs -> get_time();

?>