<?php
	//Allow the config
	define('__CONFIG__', true);

	//Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$return = [];

		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		$user_found = User::Find($email, true);

		if($user_found){
			$user_id = (int) $user_found['user_id'];
			$hash = (string) $user_found['password']; 
			
			if(password_verify($password, $hash)){
				$return['redirect'] = 'php_login_course/dashboard.php';
				$_SESSION['user_id'] = $user_id;
			} else {
				$return['error'] = "Invalid user email/password combo";
			}

		}else{
			$return['error'] = "You do not have an account <a href='/register.php'> Create one now? </a>";
		}

		echo json_encode($return, JSON_PRETTY_PRINT);exit;
	} else{
		exit('Invalid URL');
	}
	


?>