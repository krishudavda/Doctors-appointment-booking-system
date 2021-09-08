<?php
include('connection.php');
class Register_doctor extends Connection
{
	
	function register_dr()
	{
	 
	 $doctor_name = $_POST['name'];
	 $mobile = $_POST['mobile'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];

	 $query = "INSERT INTO `register_doctor`(`doctor_name`, `doctor_email`, `doctor_phn`, `doctor_pss`) VALUES ('$doctor_name','$email','$mobile','$password')";

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
$reg = new Register_doctor();
$reg -> register_dr();

	 
 
?>