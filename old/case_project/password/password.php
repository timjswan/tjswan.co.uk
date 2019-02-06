<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Survival | Save Password Hint</title>
<link href="../css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/form_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function formType()
{
	if (document.getElementById("formselect").value == "pass")
	{
		document.getElementById("passwordf").style.display="inline";
	}

	else
	{
		document.getElementById("passwordf").style.display="none";
	}

	if (document.getElementById("formselect").value == "pin")
	{
		document.getElementById("pinf").style.display="inline";
	}

	else
	{
		document.getElementById("pinf").style.display="none";
	}
}

function validate(formname)
{
	var element = document.getElementById(formname);
	for (var i = 0;i < element.length; i++)
	{
		if (element[i].value == "") {
			alert("You have missed some information");
			return false;
		}
	}
}
</script>
</head>

<body>
	<div id="pagewrap">
		<div id="headsection">
        	<div id="banner">
    			<h1 align="center">Save Password Hint</h1>
            </div>
            <div id="login">
					<?php
						session_start();

						if (isset($_SESSION['username']))
						{
							echo "<style type=\"text/css\">#nav {display: block !important;} #content {display: block !important;}</style><form action=\"../login.php\" method=\"post\"><span class=\"welcome\">hello " . $_SESSION['username'] . "</span><input type=\"submit\" class=\"fbutton\" name=\"logout\" value=\"Logout\"/></form>";
						}

						else
						{
							echo "<p>You must login to the system.</p>";
						}
					?>
            </div>
        </div>
        <div id="nav">
        	<ul>
            	<li><a href="../index.php">Home</a></li>
            	<li><a href="#">Calendar</a>
                </li>
                <li><a href="#">Archive</a>                	
                </li>
                <li><a href="#">Password</a>
                	<ul>
                    	<li><a href="password.php">Save a password hint</a></li>
                        <li><a href="showpass.php">Show stored password hints</a></li>
                    </ul>
              </li>
              <li><a href="#">Contacts</a>
              </li>
            </ul>
        </div>
        <div id="content">
        	<form>
            	<select class="select" id="formselect" onchange="formType()">
                	<option value="null">Make a selection:</option>
                	<option value="pass">Password</option>
                    <option value="pin">PIN</option>
            	</select>
            </form>
            <form id="passwordf" name="passwordf" method="post" action="savepass.php" onsubmit="return validate(this.name)">
            	<fieldset style="float: left;" class="fset" id="passfset">
                	<legend>Enter Password details:</legend>
                    <label for="pass">Password hint</label><input class="input" type="text" id="pass" name="pass" /><label for="purpose">What is this for?</label><input class="input" type="text" id="purpose" name="purpose" />
               	<input class="fbutton" type="submit" value="Store password" /><input type="hidden" id="checkf" name="checkf" value="pass" />
                </fieldset>
            </form>
            <form id="pinf" name="pinf" method="post" action="savepass.php" onsubmit="return validate(this.name)">
            	<fieldset style="float: left;" class="fset" id="pinfset">
                	<legend>Enter PIN details:</legend>
                    <label for="savepin">PIN hint</label><input class="input" type="text" id="pin" name="pin" />
                    <label for="purpose">What is this for?</label><input class="input" type="text" id="purpose" name="purpose" />
                <input class="fbutton" type="submit" value="Store PIN" /><input type="hidden" id="checkf" name="checkf" value="pin" />
                </fieldset>
            </form>
        </div>
    	<div id="footer">
        </div>
    </div>
</body>
</html>