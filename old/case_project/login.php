<?php
require_once( 'db.class.php' );

//connect to DB
$conn = new DB;
$dbuse = $conn->connect();

session_start();

//check to see if user is logging out.
if (isset($_POST['logout']))
{
	session_destroy();
	header('Location: index.php');
}

//if user has entered login details then set variables to be checked against DB
elseif (isset($_POST['e-mail']) && ($_POST['loginpass']))
{
	$username = $_POST['e-mail'];
	$password = md5($_POST['loginpass']);
}

//if no login details are entered then these messages are displayed. Extra security in cases where Javascript may be disabled.
elseif ($_POST['e-mail'] == "")
{
	echo "You have not entered an email. Please <a href=\"index.php\">try again</a>";
	return false;
}

elseif ($_POST['loginpass'] == "")
{
	echo "You have not entered a password. Please <a href=\"index.php\">try again</a>";
	return false;
}

else
	echo "You have not entered any login details. Please <a href=\"index.php\">try again</a>";

//query database to retrieve user login details.
//'bindParam' is a useful tool to prevent against SQL injection attacks, as the bound parameters
//cannot be changed before being executed within the SQL statment.

$stmt = $dbuse->prepare("SELECT * FROM users WHERE email=:username AND password=:password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$obj = $stmt->fetchObject();

//check to see whether entered lgoin details exist within DB
if (isset($obj->email) && ($obj->password))
{
	$_SESSION['userid'] = $obj->userID;
	$_SESSION['username'] = $obj->fname;
	$_SESSION['email'] = $obj->email;

	header('Location: index.php');
	//echo "successful login!";
}

//if no matching details are found this message is displayed
else
{
	echo "User details incorrect. Please <a href=\"index.php\">try again</a> or <a href=\"#\" onclick=\"window.open('register.php','regwindow','status=0,location=0,toolbar=0,menubar=0,resizable=0,width=358,height=655');\">register</a>.";
	return false;
}
$conn->close();
?>