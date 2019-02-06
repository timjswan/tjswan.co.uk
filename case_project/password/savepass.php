<?php
require_once( '../db.class.php' );
session_start();
unset($_REQUEST['PHPSESSID']);
//connect to DB
$conn = new DB;
$dbuse = $conn->connect();

$email = $_SESSION['email'];
$userid = $_SESSION['userid'];

$stmt = $dbuse->prepare("SELECT * FROM pass_pin_store WHERE email=:email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$obj = $stmt->fetchObject();

if (isset($obj->email))
{
	if ($obj->data_no >= 10)
	{
		echo 'You cannot store a combined amount of more than 10 password or PIN hints.';
		return false;
	}
	
	else
	{
		$datano = $obj->data_no;
		$datano++;
	}
}

else
{
	$datano = 1;
}


$stmt = null;

$stmt = $dbuse->prepare("INSERT INTO pass_pin_store VALUES (:userID, :datano, :email, :pinhint, :passhint, :purpose)");
$stmt->bindParam(':userID', $userid);
$stmt->bindParam(':datano', $datano);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':purpose', $_POST['purpose']);

$null = "";

if ($_POST['checkf'] == "pass")
{
	$passhint = $_POST['pass'];
	$stmt->bindParam(':passhint', $passhint);
	$stmt->bindParam(':pinhint', $null);
}

elseif ($_POST['checkf'] == "pin")
{
	$stmt->bindParam(':passhint', $null);
	$pinhint = $_POST['pin'];
	$stmt->bindParam(':pinhint', $pinhint);
}

else
{
	$stmt = null;
}

header( 'Location: password.php' );
$stmt->execute();
$conn->close();
?>
