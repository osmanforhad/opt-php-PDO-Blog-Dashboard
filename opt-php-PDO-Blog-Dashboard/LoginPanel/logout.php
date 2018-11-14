<?php
require_once('session.php');
require_once 'class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('index.php');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('index.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('index.php');
	}
?>