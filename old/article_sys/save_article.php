<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2009
 */
session_start();
try {
	require_once('myFunction.php');
	sendToDB($_POST['artcheck'], $_POST['artxmlurl']);
	//echo "<a href=\"index.php\">Back</a>";
	$db = null;
	header('Location: list_articles.php');
}

catch (PDOException $e) {
	echo $e->getMessage();
}
?>