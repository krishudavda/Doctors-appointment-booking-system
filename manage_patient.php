<?php
include('connection.php');
class Manage_patient extends Connection
{
	function delete_patient()
	{
		if (isset($_GET['delete_id'])) 
		{
			$delete_id = $_GET['delete_id'];

			$delete_query = " DELETE FROM `patient_info` WHERE `patient_id`= '$delete_id' ";

			if(!mysqli_query($this->con,$delete_query)) 
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				header("Location:../view/manage_patients.php");
			}

		}
	}
}
$manage_labs = new Manage_patient();
$manage_labs -> delete_patient();

?>