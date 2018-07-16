<?php 
	session_start();

	// variable declaration
	$fullname = "";
	$lastname = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'inflightapp');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['registerFirstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['registerLastname']);
		$email = mysqli_real_escape_string($db, $_POST['registerEmail']);
		$password_1 = mysqli_real_escape_string($db, $_POST['registerPassword']);
		$password_2 = mysqli_real_escape_string($db, $_POST['registerPassword2']);

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$select = mysqli_query($db, "SELECT `email` FROM `shopusers` WHERE `email` = '".$_POST['registerEmail']."'") or exit(mysqli_error($db));
			if(mysqli_num_rows($select)) {
			    array_push($errors, "The email is already being used.");
			}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO shopusers (firstname, lastname, email, password) 
					  VALUES('$firstname', '$lastname','$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['loginEmail']);
		$password = mysqli_real_escape_string($db, $_POST['loginPassword']);


		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM shopusers WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}else {
				array_push($errors, "Wrong email/password combination.");
			}
		}
	}

?>