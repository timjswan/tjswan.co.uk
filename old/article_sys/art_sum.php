<?php


$subject = $_GET['link'];

if ($subject == "Smoking") {
	$url = 'http://www.medicalnewstoday.com/rss/smoking.xml';
}

elseif ($subject == "Neurology") {
	$url = 'http://www.medicalnewstoday.com/rss/neurology-neuroscience.xml';
}

else {
	echo "System error";
	return false;
}

//loads xml file
$article = simplexml_load_file($url);

//class definition file
require_once( 'webpage.class.php' );

//new instance of webpage
$page = new webpage( "Article System | " . $article->channel->title, array("main.css", "art_sum_style.css"));

//add HTML to body
$page->addToBody("<h1 class=\"title\">". $article->channel->title. "</h1>");
$page->addToBody("<a class=\"indent\" href=\"". $article->channel->link . "\">" . $article->channel->link . "</a>");
$page->addToBody("<div class=\"float\"><p>Managing Editor: " . $article->channel->managingEditor . "</p>");
$page->addToBody("<p>" . $article->channel->copyright . "</p></div>");
$page->addToBody("<form id=\"saveartf\" name=\"saveartf\" method=\"post\" action=\"save_article.php\">");

//loop through each XML item within the feed and displayit.
foreach ($article->channel->item as $articles){
	$description = str_replace("&", "&amp;", $articles->description);
	$page->addToBody("<h3 class=\"artheader\"><input type=\"checkbox\" name=\"artcheck[]\" class=\"savecheck\" value=\"" . $articles->title . "%" . $articles->link . "\" /><a href=\"$articles->link\" target=\"_blank\">$articles->title</a></h3>");
	$page->addToBody("<span class=\"date\">$articles->pubDate</span>");
	$page->addToBody("<p class=\"indent\">$description</p>");
	$page->addToBody("<hr />");
}
$page->addToBody("<input type=\"hidden\" name=\"artxmlurl\" value=\"$url\" />");
$page->addToBody("\n<input class=\"savecheck\" type=\"submit\" value=\"Save Article(s)\" />\n</form>");

// echo the page contents back to the browser
echo $page->getPage();
?>