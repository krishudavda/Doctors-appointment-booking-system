<?php
include('connection.php');
class Manage_employee extends Connection
{
	
	function update_emp()
	{
		if (isset($_POST['emp_name']) && isset($_POST['emp_dept'])) 
		{
			$emp_id = $_POST['emp_id'];
			$emp_name = $_POST['emp_name'];
			$emp_dept = $_POST['emp_dept'];
			$emp_designation = $_POST['emp_designation'];
			$emp_loc = $_POST['emp_loc'];
			$emp_email = $_POST['emp_email'];
			$emp_mobile = $_POST['emp_mobile'];
			$emp_pass = $_POST['emp_pass'];
			$emp_fees = $_POST['emp_fees'];


			$query_update = " UPDATE `employee` SET `emp_name`='$emp_name',`dept_id`='$emp_dept',`emp_desigation`='$emp_designation',`emp_address`='$emp_loc',`emp_email`='$emp_email',`emp_mobile`='$emp_mobile',`emp_password`='$emp_pass',`Concultting_fees`='$emp_fees' WHERE `emp_id`='$emp_id' ";
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
	
	function delete_emp()
	{
		if (isset($_GET['delete_id'])) 
		{
			$delete_id = $_GET['delete_id'];

			$check_emp_lab = " SELECT `emp_id` FROM `labs/centers` WHERE `emp_id`='$delete_id' ";
			$result = mysqli_query($this->con,$check_emp_lab);
			if (mysqli_num_rows($result)==0) 
			{
				$delete_query = " DELETE FROM `employee` WHERE `emp_id`= '$delete_id' ";

				if(!mysqli_query($this->con,$delete_query)) 
				{
					echo "Error :".mysqli_error($this->con);
				}
				else
				{
					header("Location:../View/manage_emplooyes.php");
				}
			}
			else
				{
					header("Location:../View/manage_emplooyes.php");
				}
		}
	}
}
$manage_labs = new Manage_employee();
$manage_labs -> update_emp();
$manage_labs -> delete_emp();

?>