<?php
include('connection.php');
class Add_center extends Connection
{
	
	function add_cen()
	{
		$center_name = $_POST['center_name'];
		$center_type = $_POST['center_type'];
		$center_head = $_POST['center_head'];
		$center_loc = $_POST['center_loc'];

		$query_add_center = " INSERT INTO `labs/centers`(`lab_name`, `dept_id`, `emp_id`, `lab_location`)  VALUES ('$center_name','$center_type','$center_head','$center_loc') ";
		 if(!mysqli_query($this->con,$query_add_center))
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				echo $success = true;
			}
	}
}
$Add_center = new Add_center();
$Add_center -> add_cen();

?>