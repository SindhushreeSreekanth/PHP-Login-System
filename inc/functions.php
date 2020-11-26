<?php
	//Force the user to be logged in or redirect
	function ForceLogin(){
		if(isset($_SESSION['user_id'])){

		}else{
			header("Location: /login.php");
			exit;
		}
	}

	function ForceDashboard(){
		if(isset($_SESSION['user_id'])){
			header("Location: /dashboard.php");
			exit;
		}else{
			
		}
	}
?>