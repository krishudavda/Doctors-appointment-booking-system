<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include('connection.php');
class Update_status extends Connection
{
	function update()
	{
		$id=mysqli_real_escape_string($this->con,$_GET['id']);
		mysqli_query($this->con,"update register_tbl set verification_status='1' where email ='$id'");
		echo "Your account verified";
		?>
			<br><br><br><br>
			<button class=" btn btn-primary" onclick="window.location.href='http://localhost/ET%20Training/Appointment%20Booking%20System/admin/View/site_settings.php'">Go Back</button>
		<?php
	}
}
$update_account = new Update_status();
$update_account -> update();





