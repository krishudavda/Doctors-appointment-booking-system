<?php
include('connection.php');
class Book_appoitment extends Connection
{
	
	function appoitment()
	{
		 $patient_id = $_POST['patient_id'];
		 $patient_name = $_POST['patient_name'];
		 $patient_mobile = $_POST['patient_mobile'];
		 $patient_email = $_POST['patient_email'];
		 $doctor_name = $_POST['doctor_name'];
		 $doctor_rate = $_POST['doctor_rate'];
		 $date = $_POST['date'];
		 $time = $_POST['time'];

		 $query_check_appoitment = " SELECT `doctor_name`,`appointment_date`, `appointment_time` FROM `appointment_booking` WHERE `doctor_name`='$doctor_name' && `appointment_date`='$date' && `appointment_time`='$time' ";
		 

		 $check_appoitment = mysqli_query($this->con,$query_check_appoitment);
		 if(mysqli_num_rows($check_appoitment)>0)
			{
				echo "Doctor Is Busy In this schedule , Please Select Another Timming";
				echo $success = false;
			}
			else
			{
				$appointment_id = rand(10000,99999999);
				$query_appoitment_book = " INSERT INTO `appointment_booking`(`appointment_id`,`patient_id`, `patient_name`, `doctor_name`, `doctor_fees`, `patient_email`, `patient_mobile`, `appointment_date`, `appointment_time`) VALUES ('$appointment_id','$patient_id','$patient_name','$doctor_name','$doctor_rate','$patient_email','$patient_mobile','$date','$time') ";
				// print_r($query_appoitment_book);exit;

				$appoitment_book = mysqli_query($this->con,$query_appoitment_book);
					if(!$appoitment_book) 
					{
						echo "Error :".mysqli_error($this->con);
					}
					else
					{
						echo $success = true;
					}
			}

		 
	}
}

$patient = new Book_appoitment();
$patient -> appoitment();

?>