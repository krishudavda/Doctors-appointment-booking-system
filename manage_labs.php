<?php
include('connection.php');
class Manage_labs extends Connection
{
	
	function update_lab()
	{
		if (isset($_POST['center_name']) && isset($_POST['center_type'])) 
		{
			$center_id = $_POST['center_id'];
			$center_name = $_POST['center_name'];
			$center_type = $_POST['center_type'];
			$center_head = $_POST['center_head'];
			$center_loc = $_POST['center_loc'];

			$query_update = " UPDATE `labs/centers` SET `lab_name`='$center_name',`dept_id`='$center_type',`emp_id`='$center_head',`lab_location`='$center_loc' WHERE `lab_id`='$center_id' ";
			if(!mysqli_query($this->con,$query_update)) 
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				echo $success = true;
			}
		}
		
	}
	
	function delete_lab()
	{
		if (isset($_GET['delete_id'])) 
		{
			$delete_id = $_GET['delete_id'];

			$delete_query = " DELETE FROM `labs/centers` WHERE `lab_id`= '$delete_id' ";

			if(!mysqli_query($this->con,$delete_query)) 
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				header("Location:../View/diagnostic_center.php");
			}

		}
	}
}
$manage_labs = new Manage_labs();
$manage_labs -> update_lab();
$manage_labs -> delete_lab();

?>