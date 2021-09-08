<?php
include('connection.php');
session_start();
class LogIn extends Connection
{
	
	function verify()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = " SELECT * FROM `employee` WHERE `emp_email`='$email' && `emp_password`='$password' ";
		$results = mysqli_query($this->con,$query);

		if(!$results) 
		{
			echo "Error :".mysqli_error();
		}
		else
		{
			if(mysqli_num_rows($results)>0)
			{	
				while ($row=mysqli_fetch_assoc($results)) 
				{
					$emp_id = $row['emp_id'];
					$emp_name = $row['emp_name'];
					$dept_id = $row['dept_id'];
					$emp_desigation = $row['emp_desigation'];
					$emp_address = $row['emp_address'];
					$emp_email = $row['emp_email'];
					$emp_mobile = $row['emp_mobile'];
					$emp_password = $row['emp_password'];
					
				}
				$_SESSION['emp_id'] = $emp_id;
				$_SESSION['emp_name']= $emp_name;
				$_SESSION['dept_id']=$dept_id;
				$_SESSION['emp_desigation'] = $emp_desigation;
				$_SESSION['emp_address']=$emp_address;
				$_SESSION['emp_email']=$emp_email;
				$_SESSION['emp_mobile'] = $emp_mobile;
				$_SESSION['emp_password']=$emp_password;
				echo $success = true;
			}
			else
			{
				echo "username Password Is wrong";
			}	

		}
	}
}

$user = new LogIn();
$user -> verify();

?>