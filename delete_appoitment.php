<?php
include('connection.php');

class Delete_appoitment extends Connection
{
	
	function delete()
	{
		$deleteid = $_POST['deleteid'];

		$query_delete = " DELETE FROM `appointment_booking` WHERE appointment_id = '$deleteid' ";
		if (!mysqli_query($this->con,$query_delete)) 
		{
			echo "Error : ".mysqli_error($this->con);
		}
		else
		{
			echo $success = true;
		}
	}
}
$update = new Delete_appoitment();
$update -> delete();
?>