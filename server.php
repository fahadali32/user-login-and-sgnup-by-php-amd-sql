<?php 
	session_start();

	

	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'chat');

	// REGISTER USER
	if (isset($_POST['register'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
$trn_date = date("Y-m-d H:i:s");
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO user (username, password,trn_date) 
					  VALUES('$username', '$password','$trn_date')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}
	
	
// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

	 if (count($errors) == 0){
  $password = md5($password);
  $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$results = mysqli_query($db, $query);

 if (mysqli_num_rows($results) == 1){ 
  $_SESSION['username']=$username;
  $_SESSION['success']="you are logged in";
  header('location:index.php');
   }else{
   array_push($errors,"Wrong Username/Password");
   }
 } 
 
}

?>