<?php
session_start();


require_once('myFunction.php');

//logs user out if a user is logged in
if (isset($_POST['logout'])) {
	session_destroy();
	header('Location: index.php');
}

//checks to see if any login info has been entered
if (isset($_POST['username']) && ($_POST['password'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$pass = $pass;
}

else {
	echo "You have not entered any login information. Please <a href=\"index.php\">try again</a>";
	return false;
}

try {
	require_once('myFunction.php');
	$db = getConnection();
	$stmt = $db->query("SELECT * FROM subscriber WHERE email='$user' AND password='$pass'");
	$obj = $stmt->fetchObject();

	//sets session details provided user details are correct
	if (isset($obj->email) && (isset($obj->password))){
		$sessionUser = $obj->name;
		$sessionEmail = $obj->email;
		$_SESSION['username'] = $sessionUser;
		$_SESSION['email'] = $sessionEmail;
		header('Location: index.php');
	}
	else {
		echo "User details incorrect. Please <a href=\"index.php\">try again</a>";
		return false;
	}
}

catch (PDOException $e){
	echo $e->getMessage();
}




?>