<?php
include('connection.php');
class Add_dept extends Connection
{
	
	function add()
	{
		$dept_name = $_POST['dept_name'];

		$query = " INSERT INTO `department`(`dept_name`) VALUES ('$dept_name') ";
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
$addDept = new Add_dept();
$addDept -> add();

?>