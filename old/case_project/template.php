<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Title</title>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="css/form_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="pagewrap">
		<div id="headsection">
        	<div id="banner">
    			<h1 align="center">Header Banner</h1>
            </div>
            <div id="login">
					<?php
						session_start();

						if (isset($_SESSION['username']))
						{
							echo "<style type=\"text/css\">#nav {display: inline !important;}</style><form action=\"login.php\" method=\"post\"><label for=\"logout\">hello " . $_SESSION['username'] . "</label><input type=\"submit\" class=\"fbutton\" name=\"logout\" value=\"Logout\"/></form>";
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
            	<li><a href="../calendar/calendar.php">Calendar</a>
                	<ul>
                    	<li><a href="../calendar/menu.html">Menu</a></li>
                    </ul>
                </li>
                <li><a href="#">Archive</a>
                	<ul>
                    	<li><a href="../archive/AddNewBillRecord.html">Add New Bill Record</a></li>
 	   <li><a href="../archive/AddNewPayslipRecord.html">Add New Payslip Record</a></li>
       <li><a href="../archive/AddNewGuaranteeRecord.html">Add New Guarantee Record</a></li>
       <li><a href="../archive/BillSearchPage.html">Search Bill Records</a></li>
 	   <li><a href="../archive/PayslipSearchPage.html">Search Payslip Records</a></li>
       <li><a href="../archive/GuaranteeSearchPage.html">Search Guarantee Records</a></li>
       <li><a href="../archive/DeleteViewBillRecordsPage.php">Delete/View Bill Record Page</a></li>
       <li><a href="../archive/DeleteViewPayslipRecordsPage.php">Delete/View Payslip Record Page</a></li>
       <li><a href="../archive/DeleteViewGuaranteeRecordsPage.php">Delete/View Gaurantee Record Page</a></li>
                    </ul>
                </li>
                <li><a href="password/password.php">Password</a>
                	<ul>
                    	<li><a href="../password/password.php">Save a password hint</a></li>
                        <li><a href="../password/showpass.php">Show stored password hints</a></li>
                    </ul>
              </li>
                <li><a href="../contacts/homepage.html">Contacts</a>
                	<ul>
                    	<li><a href="../contacts/contactsHome.html">Contact List</a></li>
                        <li><a href="../contacts/communicationHome.html">Communications</a></li>
                        <li><a href="../contacts/christmascardhome.html">Christmas Cards</a></li>
                        <li><a href="../contacts/upcomingbirthdays.php ">Birthdays</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="content">
        </div>
    	<div id="footer">
        </div>
    </div>
</body>
</html>