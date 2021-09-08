<?php
include('connection.php');
class Add_time extends Connection
{
	
	function add()
	{
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];

		$query = " INSERT INTO `timming_doctor`(`start_time`,`end_time`) VALUES ('$start_time','$end_time') ";
		if(!mysqli_query($this->con,$query)) 
		{
			echo "Error :".mysqli_error();
		}
		else
		{
			echo $success = true;
		}

	}
}
$addDept = new Add_time();
$addDept -> add();

?>