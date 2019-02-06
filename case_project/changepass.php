<?php
	require_once( 'db.class.php' );
	
	$conn = new DB;
	$dbuse = $conn->connect();
	session_start();
	$email = $_SESSION['email'];
	$newpass = md5($_POST['newpass']);
	$currentpass = md5($_POST['currentpass']);
	
	$stmt = $dbuse->prepare("SELECT password FROM users WHERE email=:email");
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$obj = $stmt->fetchObject();
	$pass = $obj->password;	
	
	if ($currentpass != $pass)
	{
		echo "Your current password is incorrect.";
		echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
		return false;
	}
	
	elseif ($newpass == $pass)
	{
		echo "You cannot use your previous password.";
		echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
		return false;
	}
	
	else
	{
		$stmt = null;
		$stmt = $dbuse->prepare("UPDATE users SET password=:password WHERE email=:email");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $newpass);
		$stmt->execute();
		echo "Your password has been changed.";
		echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
	}
	
	$conn->close();	
?>