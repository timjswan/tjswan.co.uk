<?php

/**
 *
 * @version $Id$
 * @copyright 2008
 */

//class definition file
require_once( 'webpage.class.php' );

//new instance of webpage
$page = new webpage( 'Article System | Home', array('main.css'));

// add items to the page body
if(!isset($_SESSION['email'])){
	$page->addToBody('<p>To login enter the username test@test.com and the password test123</p>');
}
$page->addToBody('<a href="art_sum.php?link=Smoking" title="View the latest health articles regarding smoking.">Smoking</a><br />' );
$page->addToBody('<a href="art_sum.php?link=Neurology" title="View the latest health articles regarding neurology.">Neurology</a>' );


// echo the page contents back to the browser
echo $page->getPage();


?>