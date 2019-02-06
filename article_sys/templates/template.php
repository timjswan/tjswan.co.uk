<?php

/**
 *
 * @version $Id$
 * @copyright 2008
 */

/*IMPORT XML & XSL STYLESHEET TO PAGE

$url = '';
$xml= DomDocument::loadXML(file_get_contents($url));

//loads xsl stylesheet
$xsl = DomDocument::loadXML(file_get_contents('art_xsl_stylesheet.xsl'));

//creates new XSLT process
$proc = new XSLTProcessor;

//imports stylesheet to be processed
$proc->importStyleSheet($xsl);

*/

//class definition file
require_once( 'webpage.class.php' );

//new instance of webpage
$page = new webpage( "Article System | ", "art_sum_style.css");

// add items to the page body
$page->addToBody();

// echo the page contents back to the browser
echo $page->getPage();

/*add XML to the page body from XSL STYLESHEET
$page->addToBody($proc->transformToXML($xml)); */

?>