<?php
include('connection.php');
class Add_service extends Connection
{
	
	function add()
	{
		$service_name = $_POST['service_name'];
		$service_dept = $_POST['service_dept'];
		$service_price = $_POST['service_price'];

		$query = " INSERT INTO `services_list`(`service_name`, `service_department`, `service_price`) VALUES ('$service_name','$service_dept','$service_price') ";
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
$addDept = new Add_service();
$addDept -> add();

?>