<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Survival System | Stored Passwords</title>
<link href="../css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="../css/form_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="pagewrap">
		<div id="headsection">
        	<div id="banner">
    			<h1 align="center">Stored Passwords</h1>
            </div>
            <div id="login">
					<?php						

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
        	<p>Currently stored information:</p>
        	<table class="table">
        		<?php
					require_once( '../db.class.php' );

					$userid = $_SESSION['userid'];
					$email = $_SESSION['email'];

					$conn = new DB;
					$dbuse = $conn->connect();

					$stmt = $dbuse->prepare("SELECT * FROM pass_pin_store WHERE userID='$userid' AND email='$email'");
					$stmt->setFetchMode(PDO::FETCH_CLASS, 'pass_pin_store' );
					$stmt->execute();
					
					$itemno = 1;
					$trclass = '';
					$item = '';
					$itemtype = '';
					
					while($obj = $stmt->fetch())
					{
						if($itemno % 2 == 0){
							$trclass = 'tdeven';
						}
						else
							$trclass = 'tdodd';
							
						if ($obj['pass'] == '') {
							$item = $obj['pin'];
							$itemtype = 'PIN';
						}
						
						else {
							$item = $obj['pass'];
							$itemtype = 'Pass';
						}							
						
						echo '<tr class="'.$trclass.'"><td class="itemno">'.$itemno.': '.$itemtype.'</td><td>'.$item.'</td><td>'.$obj['purpose'].'</td></tr>';
						/*echo '<tr class="'.$trclass.'"><td class="itemno">'.$itemno.'.</td><td>'.$obj['pass'].'</td><td>'.$obj['pin'].'</td><td>'.$obj['purpose'].'</td></tr>';*/
						$itemno++;
					}
				?>
            </table>
        </div>
    	<div id="footer">
        </div>
    </div>
</body>
</html>