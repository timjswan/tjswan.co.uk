<?php
	require_once( 'db.class.php' );
	
	$conn = new DB;
	$dbuse = $conn->connect();
	
	session_start();
	//$email = $_SESSION['email'];
	$userid = $_SESSION['userid'];
	$dob = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
	
	$stmt = $dbuse->prepare("UPDATE users SET gender=:gender, fname=:fname, sname=:sname, email=:email, house_no_name=:house_no_name, street=:street, town_city=:town_city, county_state=:county_state, p_zip_code=:p_zip_code, country=:country, home_tel=:home_tel, mob_tel=:mob_tel, dob=:dob WHERE userID=:userid");
	$stmt->bindParam(':gender', $_POST['gender']);
	$stmt->bindParam(':fname', $_POST['fname']);
	$stmt->bindParam(':sname', $_POST['sname']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':userid', $userid);
	$stmt->bindParam(':house_no_name', $_POST['house_no_name']);
	$stmt->bindParam(':street', $_POST['street']);
	$stmt->bindParam(':town_city', $_POST['town_city']);
	$stmt->bindParam(':county_state', $_POST['county_state']);
	$stmt->bindParam(':p_zip_code', $_POST['p_zip_code']);
	$stmt->bindParam(':country', $_POST['country']);
	$stmt->bindParam(':home_tel', $_POST['home_tel']);
	$stmt->bindParam(':mob_tel', $_POST['mob_tel']);
	$stmt->bindParam(':dob', $dob);
	$stmt->execute();
	
	$_SESSION['email'] = $_POST['email'];
	
	echo "Your details have been updated.";
	echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
	
	$conn->close();
?>
