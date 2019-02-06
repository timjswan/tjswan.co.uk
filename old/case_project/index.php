<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Survival | Home</title>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="css/form_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function valLogin()
{
	if (document.getElementById('e-mail').value == "" && document.getElementById('loginpass').value == "")
	{
		alert("You have not entered any login details");
		return false;
	}
	
	else if (document.getElementById('e-mail').value == "")
	{
		alert("You have not entered an e-mail");
		return false;
	}
	
	else if (document.getElementById('loginpass').value == "")
	{
		alert("You have not entered a password");
		return false;
	}
	
	else
		return true;
}
</script>
</head>

<body>
	<div id="pagewrap">
		<div id="headsection">
        	<div id="banner">
    			<h1 align="center">Student Survival System</h1>
            </div>
            <div id="login">
					<?php						

						if (isset($_SESSION['username']))
						{
							echo "<style type=\"text/css\">#nav {display: block !important;}</style><form action=\"login.php\" method=\"post\"><span class=\"welcome\">hello " . $_SESSION['username'] . "</span><input type=\"submit\" class=\"fbutton\" name=\"logout\" value=\"Logout\"/><input class=\"fbutton\" type=\"button\" value=\"Account Settings\" onclick=\"window.open('accsettings.php','accsettingswindow','status=0,location=0,toolbar=0,menubar=0,width=358, height=800');\" /></form>";
						}

						else
						{
							echo "<form id=\"loginf\" method=\"post\" name=\"loginf\" action=\"login.php\" onsubmit=\"return valLogin()\"><label for=\"e-mail\">E-mail</label><input class=\"input\" name=\"e-mail\" id=\"e-mail\" type=\"text\" /><label for=\"loginpass\">Password</label><input class=\"input\" name=\"loginpass\" id=\"loginpass\" type=\"password\" /><input class=\"fbutton\" type=\"submit\" value=\"Login\"/><input class=\"fbutton\" type=\"button\" id=\"regbutton\" value=\"Register\" onclick=\"window.open('register.php','regwindow','status=0,location=0,toolbar=0,menubar=0,width=358,height=655');\" /></form>";
						}
					?></div>
        </div>
        <div id="nav">
        	<ul>
            	<li><a href="index.php">Home</a></li>
            	<li><a href="#">Calendar</a>
                </li>
                <li><a href="#">Archive</a>                	
                </li>
                <li><a href="password/password.php">Password</a>
                	<ul>
                    	<li><a href="password/password.php">Save a password hint</a></li>
                        <li><a href="password/showpass.php">Show stored password hints</a></li>
                    </ul>
              </li>
              <li><a href="#">Contacts</a>
              </li>
            </ul>
        </div>
        <!--PHP--><?php
		if (!isset($_SESSION['username'])){
		?>
        <div id="welcome">
        <img src="media/diary.jpg" style="float: right; position: relative; width: 220px; height: 180px;" />
        <p>To login enter the username test@test.com and the password test123</p>
        <p>Hello and welcome to the Student Survival System. Here you can keep your student life on track by using the systems features.</p><br /><p>You can keep a diary, save password hints, record your bills and also record an address book. You never need to worry about keeping various journals, books around that are cumbersome and keep your desk from being tidy!</p><br /><p>If you have not already registered, please feel free to <a href="#" onclick="window.open('register.php','regwindow','status=0,location=0,toolbar=0,menubar=0,resizable=0,width=358,height=655');">sign up</a>!</p>        
        </div>
        <?php
		}
		
		else {		
		?>        
        <div id="welcome">
        	<p>Hello and welcome to the Student Survival System. Here you can keep your student life on track by using the systems features.</p><br /><p>You can keep a diary, save password hints, record your bills and also record an address book. You never need to worry about keeping various journals, books around that are cumbersome and keep your desk from being tidy!</p>
        </div>
        <?php
		}
		?><!--PHP END-->
    	<div id="footer">
        </div>
    </div>
</body>
</html>