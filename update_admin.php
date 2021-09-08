<?php
include('connection.php');
session_start();
class Update_doctor extends Connection
{
	
	function update()
	{
		 $emp_id = $_POST['emp_id'];
		 $emp_name = $_POST['emp_name'];
		 $emp_email = $_POST['emp_email'];
		 $emp_mobile = $_POST['emp_mobile'];
		 $emp_pass = $_POST['emp_pass'];

		 $query = "UPDATE `employee` SET `emp_name`='$emp_name',`emp_email`='$emp_email',`emp_mobile`='$emp_mobile',`emp_password`='$emp_pass' WHERE `emp_id`='$emp_id' ";

		 if(!mysqli_query($this->con,$query)) 
		{
			echo "Error :".mysqli_error($this->con);
		}
		else
		{
				$_SESSION['emp_name']= $emp_name;
				$_SESSION['emp_email']=$emp_email;
				$_SESSION['emp_mobile'] = $emp_mobile;
				$_SESSION['emp_password']=$emp_pass;
			echo $success = true;
		}

	}
}
$update = new Update_doctor();
$update -> update();

?>