<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2009
 */

//class definition file
require_once( 'webpage.class.php' );

//new instance of webpage
$page = new webpage( "Article System | Saved Articles", array("main.css", "art_sum_style.css") );

require_once('myFunction.php');
$db = getConnection();
$userid = $_SESSION['email'];
$stmt = $db->prepare("SELECT * FROM article WHERE subscriberID = '$userid' ORDER BY articleID DESC");
$stmt->setFetchMode(PDO::FETCH_CLASS, 'article' );
$stmt->execute();

$result = "";

//loop through each saved article and display
while($obj = $stmt->fetch()){
	$result .= "<h3>" . $obj['title'] . "</h3>";
	$result .= "<a href=\"" . $obj['link'] . "\" target=\"_blank\">" . $obj['link'] . "</a>";
	$result .= "<p class=\"indent\">" . $obj['body'] . "...</p>";
	$result .= "<hr />";
}
$page->addToBody($result);

// echo the page contents back to the browser
echo $page->getPage();







?>