<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Survival System | Account Settings</title>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="css/form_style.css" rel="stylesheet" type="text/css" />
<link href="css/register_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
	function makesure()
	{
		alert("ALL of your user details and password will be lost");
		var conf = confirm("Are you really sure you want to cancel?");

		if (conf)
		{
			return true;
		}

		else
		{
			return false;
		}
	}
	
	function validate()
	{		
		if (document.getElementById('newpass').value == "")
		{
			alert("Please enter your password");
			return false;
		}
	
		else if (document.getElementById('confpass').value == "")
		{
			alert("Please confirm your password");
			return false;
		}
		
		else if (document.getElementById('newpass').value != document.getElementById('confpass').value) 
		{
			alert("Your passwords do not match!");
			return false;
		}
	}
-->
</script>
</head>
<body>
	<div id="pagewrap" style="width: 358px !important;">
		<div id="headsection">
        	<div id="banner">
            	<img src="media/button_close_panel.gif" style="float: right;" onclick="self.close()" />
    			<h1 align="center">Account Settings</h1>
            </div>
        </div>
        <div id="nav">
        	<ul>
            	<li><a href="index.php">Home</a></li>
            	<li><a href="#">Calendar</a>
                	<ul>
                    	<li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </li>
                <li><a href="#">Archive</a>
                	<ul>
                    	<li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </li>
                <li><a href="#">Password</a>
                	<ul>
                    	<li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </li>
                <li><a href="#">Contacts</a>
                	<ul>
                    	<li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="content" style="display: block">
        	<form id="userchange" name="userchange" action="updateuser.php" method="post">
            	<fieldset class="fset">
                <legend>Personal Details:</legend>
            	<table>
        		<?php
					require_once( 'db.class.php' );
					$conn = new DB("mysql", "unn_s018087", "unn_s018087", "swindon04");
					$dbuse = $conn->connect();
					
					$email = $_SESSION['email'];
					$userid = $_SESSION['userid'];
					$stmt = $dbuse->prepare("SELECT * FROM users WHERE email=:email AND userID=:userid");
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':userid', $userid);
					$stmt->execute();

					$obj = $stmt->fetchObject();
					$dobarr = preg_split("/-/", $obj->dob);

					$year = $dobarr[0];
					$month = $dobarr[1];
					$day = $dobarr[2];

					echo "<tr><td>Gender:</td><td><input class=\"input\" type=\"text\" id=\"gender\" name=\"gender\" value=\"$obj->gender\" /></td></tr>";
					echo "<tr><td>Forename:</td><td><input class=\"input\" type=\"text\" id=\"fname\" name=\"fname\" value=\"$obj->fname\" /></td></tr>";
					echo "<tr><td>Surname:</td><td><input class=\"input\" type=\"text\" id=\"sname\" name=\"sname\" value=\"$obj->sname\" /></td></tr>";
					echo "<tr><td>Email:</td><td><input class=\"input\" type=\"text\" id=\"email\" name=\"email\" value=\"$obj->email\" /></td></tr>";
					echo "<tr><td>House number/name:</td><td><input class=\"input\" type=\"text\" id=\"house_no_name\" name=\"house_no_name\" value=\"$obj->house_no_name\" /></td></tr>";
					echo "<tr><td>Street:</td><td><input class=\"input\" type=\"text\" id=\"street\" name=\"street\" value=\"$obj->street\" /></td></tr>";
					echo "<tr><td>Town/City:</td><td><input class=\"input\" type=\"text\" id=\"town_city\" name=\"town_city\" value=\"$obj->town_city\" /></td></tr>";
					echo "<tr><td>County/State:</td><td><input class=\"input\" type=\"text\" id=\"county_state\" name=\"county_state\" value=\"$obj->county_state\" /></td></tr>";
					echo "<tr><td>Post/ZIP Code:</td><td><input class=\"input\" type=\"text\" id=\"p_zip_code\" name=\"p_zip_code\" value=\"$obj->p_zip_code\" /></td></tr>";
					echo "<tr><td>Country:</td><td><input class=\"input\" type=\"text\" id=\"country\" name=\"country\" value=\"$obj->country\" /></td></tr>";
					echo "<tr><td>Home Tel:</td><td><input class=\"input\" id=\"home_tel\" name=\"home_tel\" type=\"text\" value=\"$obj->home_tel\" /></td></tr>";
					echo "<tr><td>Mobile Tel:</td><td><input class=\"input\" type=\"text\" id=\"mob_tel\" name=\"mob_tel\" value=\"$obj->mob_tel\" /></td></tr>";
					echo "<tr><td>DOB:</td><td><input class=\"inputdob\" type=\"text\" id=\"day\" name=\"day\" value=\"$day\" /><input class=\"inputdob\" type=\"text\" id=\"month\" name=\"month\" value=\"$month\" /><input class=\"inputdob\" type=\"text\" id=\"year\" name=\"year\" value=\"$year\" /></td></tr>";
					echo "<tr><td><span class=\"forminf\">(DD-MM-YYYY)</span></td></tr>";
				?>
                    <tr><td><input class="fbutton" type="submit" value="Change Details" /></td></tr>
                </table>
                </fieldset>
            </form>
            <form id="changepassf" name="changepassf" action="changepass.php" method="post" onsubmit="return validate()">
            	<fieldset class="fset">
                	<legend>Change your password:</legend>
                    <table>
                    	<tr>
                    		<td>Current password:</td><td><input class="input" type="password" id="currentpass" name="currentpass" /></td></tr>
                    		<tr><td>New Password:</td><td><input class="input" type="password" id="newpass" name="newpass" /></td></tr>

                    <tr><td>Confirm:</td><td><input class="input" type="password" id="confpass" name="confpass" /></td></tr>
                    <tr><td><input class="fbutton" type="submit" value="Change Password" /></td></tr>
                    </table>
                </fieldset>
            </form>
            <form action="deleteuser.php" method="post" onsubmit="return makesure()">
                <fieldset class="fset">
                    <legend>Cancel</legend>
                    <table>
                        	<tr><td>Do you wish to cancel your account?</td></tr>
                            <tr><td>If so please renter your password:</td><td><input class="input" maxlength="16" type="password" id="cancelpass" name="cancelpass" /></td></tr>
                            <tr><td><input class="fbutton" type="submit" value="Cancel" /></td></tr>
                            </table>
                </fieldset>
            </form>
        </div>
    	<div id="footer">
        </div>
    </div>
</body>
</html>