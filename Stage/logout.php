<?php

session_start();
//logout from the account with the id client 
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
}
header("Location: index.php");
die;