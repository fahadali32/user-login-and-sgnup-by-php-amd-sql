<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mysite</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>