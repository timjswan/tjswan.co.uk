<?php
class webpage{

	protected $head;
	protected $footer;
	protected $body;

	function __construct( $title, $stylesheets ){
		//builds the HTML essentials
		session_start();
		$this->head = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en-US\" lang=\"en-US\">\n<head>\n<title>$title</title>";
		foreach ($stylesheets as $value){
			$this->head .= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/" . $value . "\"" . " />";
		}
		unset($value);
		$this->head .= "\n<style type=\"text/css\">";

		//checks to see if anyone is logged in before providing the ability to save articles.
		if (isset($_SESSION['username'])) {

			$this->head .= ".savecheck{display: inline !important;}";
		}
		$this->head .= "</style>";
		$this->head .= "\n</head>";

		$this->body = "\n<body>\n<div id=\"header\">";

			//checks to see if anyone is logged in then provides the option to logout and displays username.
			if (isset($_SESSION['username'])) {
				$user = $_SESSION['username'];
				$this->body .= "\n<form id=\"loginf\" method=\"post\" action=\"login.php\">\nYou are logged in as $user<input type=\"submit\" name=\"logout\" value=\"Logout\" />\n</form>";
			}
			else {
				$this->body .=  "\n<form id=\"loginf\" name=\"loginf\" method=\"post\" action=\"login.php\">\nUsername:&nbsp;<input type=\"text\" name=\"username\" />&nbsp;Password:&nbsp;<input type=\"password\" name=\"password\" />&nbsp;<input type=\"submit\" value=\"Submit\" />\n</form>";
			}

		$this->body .= "\n<div class=\"nav\"><a href=\"index.php\">Home</a>";

			//checks to see if anyone is logged in before providing them option to list saved articles
			if (isset($_SESSION['username'])) {
				$this->body .= "&nbsp;<a href=\"list_articles.php\">Saved Articles</a>";
			}

		//finishes the HTML
		$this->body .= "</div>\n</div>";
		$this->body .= "\n<div id=\"content\">";
		$this->footer = "\n</div>\n<div id=\"valid\"><p><a href=\"http://validator.w3.org/check?uri=referer\"><img src=\"http://www.w3.org/Icons/valid-xhtml10-blue\" alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a></p>\n</div>";
		$this->footer .= "\n</body>\n</html>";
	}

	//adds HTML/text to body according to the argument passed
	public function addToBody( $body ){
		$this->body .=  "\n" . $body;
	}

	//when called builds the page as a whole then echos it back to the browser
	public function getPage(){
		return $this->head.$this->body.$this->footer;
	}
}
?>