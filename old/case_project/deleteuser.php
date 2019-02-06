<?php
	session_start();
	require_once( 'db.class.php' );
	$conn = new DB;
	$dbuse = $conn->connect();
	
	if ($_POST['cancelpass'] == "")
	{
		echo "no password entered";
		echo "<br /><input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
		return false;		
	}
	
	else
	{
		$password = md5($_POST['cancelpass']);
		$stmt = $dbuse->prepare("DELETE FROM users WHERE password=:password AND email=:email");
		$stmt->bindParam(':email', $_SESSION['email']);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
	
		$stmt = null;
	
		$stmt = $dbuse->prepare("DELETE FROM pass_pin_store WHERE email=:email");
		$stmt->bindParam(':email', $_SESSION['email']);
		$stmt->execute();
	
		echo "<p>You are no longer a user of the Student Surivival System</p><br />";
		echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
	
		session_destroy();	
	}
	
	$conn->close();
?>
