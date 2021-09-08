<?php
include('connection.php');
class Add_offers extends Connection
{
	
	function add()
	{
		$offer_name = $_POST['offer_name'];
		$offer_description = $_POST['offer_description'];

		$query = " INSERT INTO `offers_tbl`(`offer_name`, `offer_description`) VALUES ('$offer_name','$offer_description') ";
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
$addDept = new Add_offers();
$addDept -> add();

?>