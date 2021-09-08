<?php
include 'connection.php';
class Add_emp extends Connection
{                                
   function add()
   {
   	$emp_name = $_POST['emp_name'];
   	$emp_dept = $_POST['emp_dept'];
   	$emp_designation = $_POST['emp_designation'];
   	$emp_loc = $_POST['emp_loc'];
      $emp_email = $_POST['emp_email'];
      $emp_mobile = $_POST['emp_mobile'];
      $emp_password = $_POST['emp_pass'];


   $save_emp = "INSERT INTO `employee`(`emp_name`, `dept_id`, `emp_desigation`, `emp_address`, `emp_email`, `emp_mobile`, `emp_password`) VALUES ('$emp_name','$emp_dept','$emp_designation','$emp_loc','$emp_email','$emp_mobile','$emp_password')";  
      if(!mysqli_query($this->con,$save_emp))
			{
				echo "Error :".mysqli_error($this->con);
			}
			else
			{
				echo $success = true;
			}
       
       }
   
   }
   
   $add = new Add_emp();
   
   $add -> add();


?>