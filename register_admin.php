<?php
include('connection.php');
class register extends Connection
{
	
	function register_record()
	{
	 
	 $username = $_POST['username'];
	 $mobile = $_POST['mobile'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];

	 $query = "INSERT INTO `register_tbl`(`username`, `mobile`, `email`, `password`) VALUES ('$username','$mobile','$email','$password')";

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
$reg = new register();
$reg -> register_record();

	 
 
?>