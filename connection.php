<?php
class Connection
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $db = "appointment_booking_system";
	public $con;
	public function __construct()
	{
		$this->con = $this->connect();
	}
	
	public function connect()
	{
		$con = mysqli_connect($this->host,$this->user,$this->password,$this->db );
		if(!$con)
		{
			echo "Errorselect :"."<br>".mysqli_connect_error();
		}
		return $con;
	}

	
}
?>