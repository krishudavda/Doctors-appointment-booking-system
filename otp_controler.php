<?php
session_start();
require ('../View/textlocal.class.php');
include('connection.php');
class Otp_controller extends Connection
{
	
	function send_otp()
	{
		if (isset($_POST['mobile'])) 
		{
            // echo "string";exit;
			$mobile = $_POST['mobile'];
            $get_mobile = "SELECT `emp_mobile` FROM `employee` WHERE `emp_mobile`= '$mobile' ";
            $results = mysqli_query($this->con,$get_mobile);
            if(mysqli_num_rows($results)>0) 
            {
                $_SESSION['emp_mobile'] = $mobile;
                // $apiKey = urlencode('');
                // $Textlocal = new Textlocal(false, false, $apiKey);
                
                $numbers = array(
                    $mobile
                );
                // $sender = 'TXTLCL';
                // $otp = rand(100000, 999999);
                $otp = 1234;
                // echo $otp;
                $_SESSION['session_otp'] = $otp;
                // $message = "Your One Time Password is " . $otp;
                
                try{
                    // $response = $Textlocal->sendSms($numbers, $message, $sender);
                    echo $success = true;
                    exit();
                }catch(Exception $e){
                    die('Error: '.$e->getMessage());
                }   
            }
            else
            {
                echo "Please Enter Valid Registered Mobile Number";
            }

			
		}
		elseif (isset($_POST['otp'])) 
		{
			$otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) 
                {
                    unset($_SESSION['session_otp']);
                    echo $success = true;

                } 
                else 
                {
                    echo "OTP Is not Matched";
                }
		}
	}
}
$OTP = new Otp_controller();
$OTP -> send_otp();
?>