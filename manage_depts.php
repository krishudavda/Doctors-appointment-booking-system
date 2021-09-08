<?php
include('connection.php');
class Manage_dept_details extends Connection
{
		function edit_dept(){
			if (isset($_POST['dept_id']) && $_POST['dept_name']) {
				$dept_id = $_POST['dept_id'];
				$dept_name = $_POST['dept_name'];

				$query_upd_dept = " UPDATE `department` SET`dept_name`='$dept_name' WHERE `dept_id`='$dept_id' ";
					if(!mysqli_query($this->con,$query_upd_dept)) 
					{
						echo "Error :".mysqli_error();
					}
					else
					{
						echo $success = true;
					}
			}

		}
	
	function delete_dept()
	{
		if (isset($_GET['delete_id'])) 
		{
			$delete_id = $_GET['delete_id'];
			$dept_id = $_GET['dept_id'];

			$check_dept_lab = " SELECT `dept_id` FROM `labs/centers` WHERE `dept_id`='$dept_id' ";
			$result = mysqli_query($this->con,$check_dept_lab);
			if (mysqli_num_rows($result)==0) 
			{
				$check_dept_emp = " SELECT `dept_id` FROM `employee` WHERE `dept_id`='$dept_id' ";
				$results = mysqli_query($this->con,$check_dept_emp);

				if(mysqli_num_rows($results)==0)
				{
					$delete_query = " DELETE FROM `department` WHERE `dept_id`= '$delete_id' ";

					if(!mysqli_query($this->con,$delete_query)) 
					{
						echo "Error :".mysqli_error($this->con);
					}
					else
					{
						header("Location:../View/manage_Department.php");
					}
				}
				else
				{
					header("Location:../View/manage_Department.php");
				}
			}
			else
				{
					header("Location:../View/manage_Department.php");
				}

				
		}
	}
}
$manage_labs = new Manage_dept_details();
$manage_labs -> delete_dept();
$manage_labs -> edit_dept();

?>