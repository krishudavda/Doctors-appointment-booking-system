<?php
include('connection.php');

class SEO_settings extends Connection
{
	function get_SEO_details()
	{
		$response = array();
		if (isset($_POST['action'])) 
		{
			$action = $_POST['action'];

			$check = " SELECT * FROM `seo_settings` ";
			$result = mysqli_query($this->con,$check);
			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result))
				{
					 $response = $row;
				}
			}
			else
			{
				echo "Records Not Found : ".mysqli_error($this->con);
			}
			echo json_encode($response);
		}
	}

	function update_seo()
	{
		if (isset($_POST['title'])) 
		{
			$title = $_POST['title'];
			$description = $_POST['description'];
			$keywords = $_POST['keywords'];
			$author = $_POST['author'];

			$query = "UPDATE `seo_settings` SET `title`='$title',`description`='$description',`keywords`='$keywords',`author`='$author'";
			if (mysqli_query($this->con,$query)) 
			{
				echo $sucsess = true;
			}
			else
			{
				echo mysqli_error($this->con);
			}

		}
	}
}

$SEO = new SEO_settings();
$SEO -> get_SEO_details();
$SEO -> update_seo();
?>