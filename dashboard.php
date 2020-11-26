<?php
	//Allow the config
	define('__CONFIG__', true);
	//Require the config 
	require_once "inc/config.php"; 

	ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="follow">
	<title></title>
	<base href="/" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/css/uikit.min.css">
</head>
<body>
	<div class="uk-section uk-container">
		This is a dashboard
		You are signed in as user: <?php echo $_SESSION['user_id']; ?>
	</div>

	<?php require_once "inc/footer.php"; ?>
</body>
</html>