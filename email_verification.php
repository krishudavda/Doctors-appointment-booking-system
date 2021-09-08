<?php
include('connection.php');
require 'PHPMailerAutoload.php';

class Account_verify extends Connection
{
	function get_status()
	{
		if (isset($_POST['email'])) 
		{
			$email = $_POST['email'];
			$check = " SELECT `verification_status` FROM `register_tbl` WHERE `email`='$email' ";
			$result = mysqli_query($this->con,$check);
			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result))
				{
					$status = $row['verification_status'];
					if ($status == 1) 
					{
						echo $success = true;
					}
					
				}
			}
			else
			{
				echo "Records Not Found : ".mysqli_error($this->con);
			}
			
		}
	}

	function send_verification()
	{
		if (isset($_POST['verify_email'])) 
		{
			$verify_email = $_POST['verify_email'];
		
		$mailHtml="Please confirm your account registration by clicking the button or link below: <a href='http://localhost/ET%20Training/Appointment%20Booking%20System/admin/modal/update_status.php?id=$verify_email'>http://localhost/ET%20Training/Appointment%20Booking%20System/admin/modal/update_status.php</a>";

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 4;                               
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true; 
			$mail->Username = 'Vatsalshah2020@gmail.com';
			$mail->Password = 'My mom dad010420';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('Vatsalshah2020@gmail.com', 'Vatsalshah2020@gmail.com');
			$mail->addAddress('Vatsalshah2020@gmail.com');

			$mail->addReplyTo('Vatsalshah2020@gmail.com');
			$mail->isHTML(true); 
			$mail->Subject = 'Account Verification';
			$mail->Body    = $mailHtml;
			$mail->AltBody = $mailHtml;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo $success = true;;
			}

		}
	}
}

$verify_account = new Account_verify();
$verify_account -> get_status();
$verify_account -> send_verification();
?>