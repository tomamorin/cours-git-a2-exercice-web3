<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if (isset($_POST['email']) && !empty($_POST['email']) &&
	isset($_POST['password']) && !empty($_POST['password'])
) {
	$email = $_POST['email'];
	$passeword = $_POST['password'];

	/*userConnection
		return :
			true for connection OK
			false for fail
		$db -> 				database object
		$email -> 			field value : email
		$password -> 		field value : password
	*/
	if (userConnection($db, $email, $passeword)) {
		header('Location: dashboard.php');
	}
	else {
		$error = "Mauvaise identification";
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';