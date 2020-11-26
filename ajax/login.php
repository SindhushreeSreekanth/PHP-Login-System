<?php
	//Allow the config
	define('__CONFIG__', true);

	//Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$return = [];

		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1){
			$User = $findUser->fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password']; 
			
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