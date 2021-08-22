<?php
 // check if the user exist in the database and return his data :
function check_login($conn)
{
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$query = "select * from user where id = '$id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	// redirect to login
	header("Location: login.php");
	die;
}