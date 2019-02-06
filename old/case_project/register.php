<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Survival | Register</title>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="css/register_style.css" rel="stylesheet" type="text/css" />
<link href="css/form_style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function checkForm()
{
	var date = new Date();
	var year = date.getFullYear();
	var element = document.getElementById('regf');

	if (document.getElementById('gender').value == 0)
	{
		alert("Please select your gender");
		return false;
	}

	else if (document.getElementById('fname').value == "")
	{
		alert("Please enter your forename");
		return false;
	}

	else if (document.getElementById('sname').value == "")
	{
		alert("Please enter your Surname");
		return false;
	}

	else if (document.getElementById('email').value == "")
	{
		alert("Please enter your email");
		return false;
	}

	else if (document.getElementById('house_no_name').value == "")
	{
		alert("Please enter your House number/name");
		return false;
	}

	else if (document.getElementById('street').value == "")
	{
		alert("Please enter your Street");
		return false;
	}

	else if (document.getElementById('town_city').value == "")
	{
		alert("Please enter your Town/City");
		return false;
	}

	else if (document.getElementById('p_zip_code').value == "")
	{
		alert("Please enter your Post/Zip code");
		return false;
	}

	else if (document.getElementById('country').value == "")
	{
		alert("Please enter your Country");
		return false;
	}

	else if (document.getElementById('home_tel').value == "")
	{
		alert("Please enter your Home phone number");
		return false;
	}

	else if (document.getElementById('day').value > 31 || document.getElementById('day').value == "")
	{
		alert("The day you have entered is incorrect.");
		return false;
	}

	else if (document.getElementById('month').value > 12 || document.getElementById('month').value == "")
	{
		alert("The month you have entered is incorrect.");
		return false;
	}

	else if (document.getElementById('year').value > year || document.getElementById('year').value == "")
	{
		alert("The year you have entered is incorrect.");
		return false;
	}

	else if (document.getElementById('password').value == "")
	{
		alert("Please enter your password");
		return false;
	}

	else if (document.getElementById('passconf').value == "")
	{
		alert("Please confirm your password");
		return false;
	}

	else if (document.getElementById('password').value != document.getElementById('passconf').value) {
		alert("Your passwords do not match!");
		return false;
	}

	else if (document.getElementById('s_question').value == "")
	{
		alert("Please enter your secret question");
		return false;
	}

	else if (document.getElementById('s_answer').value == "")
	{
		alert("Please enter your secret answer");
		return false;
	}

	else
		return true;
}
-->
</script>

</head>

<body>
	<div id="pagewrap" style="width: 358px !important;">
		<div id="headsection">
        	<div id="banner">
            	<img src="media/button_close_panel.gif" style="float: right;" onclick="self.close()" />
    			<h1 align="center">Register</h1>
            </div>
        </div>
        <div id="nav">
        	<ul>
            	<li><a href="#">Home</a></li>
            	<li><a href="#">Calendar</a>
                	<ul>
                    	<li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </li>
                <li><a href="#">Bills</a>
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
			<form id="regf" method="post" action="adduser.php" onsubmit="return checkForm()">
				<fieldset class="fset">
				<legend>Personal Details:</legend>
				<table>
					<tr>
						<td>Gender:</td><td><select class="select" id="gender" name="gender"><option value="0"></option><option value="Male">Male</option><option value="Female">Female</option></select></td>
					</tr>
					<tr>
						<td>Forename:</td><td><input class="input" type="text" id="fname" name="fname" /></td>
					</tr>
					<tr>
						<td>Surname:</td><td><input class="input" type="text" id="sname" name="sname" /></td>
					</tr>
					<tr>
						<td>E-mail:</td><td><input class="input" type="text" id="email" name="email" /></td>
					</tr>
					<tr>
						<td>House Number/Name:</td><td><input class="input" type="text" id="house_no_name" name="house_no_name" /></td>
					</tr>
					<tr>
						<td>Street:</td><td><input class="input" type="text" id="street" name="street" /></td>
					</tr>
					<tr>
						<td>Town/City:</td><td><input class="input" type="text" id="town_city" name="town_city" /></td>
					</tr>
					<tr>
						<td>County/State:</td><td><input class="input" type="text" id="county_state" name="county_state" /></td>
					</tr>
					<tr>
						<td>Postal/ZIP Code:</td><td><input class="input" type="text" id="p_zip_code" name="p_zip_code" /></td>
					</tr>
					<tr>
						<td>Country:</td><td><input class="input" type="text" id="country" name="country" /></td>
					</tr>
					<tr>
						<td>Home Tel:</td><td><input class="input" type="text" id="home_tel" name="home_tel" /></td>
					</tr>
					<tr>
						<td>Mobile No:</td><td><input class="input" type="text" id="mob_tel" name="mob_tel" /></td>
					</tr>
					<tr>
						<td>Date of Birth:</td>
						<td>
						<select class="select" name="day" id="day">
							<?php
								for ($i = 1;$i <= 31;$i++)
									echo '<option value='.$i.'>'.$i.'</option>';
							?>
						</select>
						<select class="select" name="month" id="month">
							<option value="01">January</option>
                			<option value="02">February</option>
                			<option value="03">March</option>
                			<option value="04">April</option>
                			<option value="05">May</option>
               				<option value="06">June</option>
                			<option value="07">July</option>
                			<option value="08">August</option>
                			<option value="09">September</option>
                			<option value="10">October</option>
                			<option value="11">November</option>
                			<option value="12">December</option>
						</select>
						<select class="select" name="year" id="year">
							<?php
								$y = date('Y') - 1;
								for ($i = $y;$i >= 1970;$i--)
									echo '<option value='.$i.'>'.$i.'</option>';
							?>
						</select>
						</td>
					</tr>
				</table>
				</fieldset>
				<fieldset class="fset">
					<legend>Security Details:</legend>
					<table><tr><td>Password:</td><td><input class="input" type="password" maxlength="16" id="password" name="password" /></td><td></td></tr>
                        <tr><td><p class="forminf">Your password can be no longer than 16 characters and a minimum of 8 characters.</p></td></tr>
						<tr><td>Confirm Password:</td><td><input class="input" type="password" maxlength="16" id="passconf" name="passconf" /></td></tr>
                        <tr><td>Secret Question:</td><td><input class="input" type="text" id="s_question" name="s_question" /></td><tr>
						<tr><td>Secret Answer:</td><td><input class="input" type="text" id="s_answer" name="s_answer" /></td></tr></table>
				</fieldset>
				<input class="fbutton" type="submit" value="Submit my details" /><input class="fbutton" type="button" value="Clear" onclick="this.form.reset()" />
			</form>
        </div>
    	<div id="footer">
        </div>
    </div>
</body>
</html>