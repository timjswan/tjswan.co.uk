<?php
require_once( 'db.class.php' );

//connect to DB
$conn = new DB;
$dbuse = $conn->connect();

$dob = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
$password = md5($_POST['password']);
$email = $_POST['email'];

try
{
	$stmt = $dbuse->prepare("SELECT email FROM users WHERE email='$email'");
	$stmt->setFetchMode(PDO::FETCH_CLASS, 'users' );
	$stmt->execute();
	$obj = $stmt->fetch();
	
	if ($_POST['email'] == $obj['email'])
	{
		echo "<p>The e-mail address you have entered already exists. Please <a href=\"register.php\">try again</a></p>";
		$stmt = null;
	}
	
	else
	{
		$stmt = $dbuse->prepare("INSERT INTO users (gender, fname, sname, email, password, s_question, s_answer, house_no_name, street, town_city, county_state, p_zip_code, country, home_tel, mob_tel, dob) VALUES (:gender, :fname, :sname, :email, :password, :s_question, :s_answer, :house_no_name, :street, :town_city, :county_state, :p_zip_code, :country, :home_tel, :mob_tel, :dob)");
		$stmt->bindParam(':gender', $_POST['gender']);
		$stmt->bindParam(':fname', $_POST['fname']);
		$stmt->bindParam(':sname', $_POST['sname']);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':s_question', $_POST['s_question']);
		$stmt->bindParam(':s_answer', $_POST['s_answer']);
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

		echo "<p>You are now registered</p><br />";
		echo "<input type=\"button\" value=\"Close\" onclick=\"self.close()\" />";
	}
}

catch (PDOexception $e)
{
	echo "Error: " . $e->getMessage();
	die();
}

$conn->close();
?>