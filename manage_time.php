<?php
include('connection.php');
class Manage_time_details extends Connection
{
		function edit_time(){
			if (isset($_POST['time_id']) && $_POST['start_time']) {
				$time_id = $_POST['time_id'];
				$start_time = $_POST['start_time'];
				$end_time = $_POST['end_time'];

				$query_upd_time = " UPDATE `timming_doctor` SET `start_time`='$start_time',`end_time`='$end_time' WHERE `time_id`='$time_id' ";
					if(!mysqli_query($this->con,$query_upd_time)) 
					{
						echo "Error :".mysqli_error($this->con);
					}
					else
					{
						echo $success = true;
					}
			}

		}
	
	function delete_time()
	{
		if (isset($_GET['delete_id'])) 
		{
			$delete_id = $_GET['delete_id'];
			$dept_id = $_GET['dept_id'];

			$delete_query = " DELETE FROM `timming_doctor` WHERE `time_id`='$delete_id' ";

			if(!mysqli_query($this->con,$delete_query)) 
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				header("Location:../View/manage_timming.php");
			}				
		}
	}
}
$manage_labs = new Manage_time_details();
$manage_labs -> edit_time();
$manage_labs -> delete_time();

?>