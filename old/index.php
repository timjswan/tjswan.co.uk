<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tim Swan</title>

	<meta property="og:title" content="Tim Swan"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="http://www.tjswan.co.uk"/>
	<meta property="og:image" content="http://www.tjswan.co.uk/images/facebookLike.png"/>
	<meta property="og:site_name" content="Examples of work by Tim Swan"/>
	<meta property="fb:app_id" content="195805213775806"/>
	<meta property="og:description" content="Examples of work completed at University or as part of recent projects."/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="styles/site_wide.css" />
	<link rel="stylesheet" type="text/css" href="styles/background_styles.css" />
	<script type="text/javascript">
		var ltie8 = false;
	</script>
	<!--[if lt IE 8]>
	<script type="text/javascript">
		//since I still believe ie7 or less should at least be given some minimal thought I am kind enough to give browers less than IE8 user a basic version of the site.
		ltie8 = true;
	</script>
	<![endif]-->
	<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="styles/background_stylesltie9.css" />
	<link rel="stylesheet" type="text/css" href="styles/stylesltie9.css" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="styles/resolution.css" />
	<link rel="stylesheet" type="text/css" href="styles/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="styles/jquery.ui.dialog.css" />
	<script type="text/javascript" src="scripts/jquery-1.10.0.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="scripts/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="scripts/loadWorkGallCycle.js"></script>
	<script type="text/javascript" src="scripts/loadSocial.js"></script>
</head>

<body>
<div id="wrap">
	<div id="banner">
		<div id="contact">
			<ul id="details">
				<li class="mailbullet">timjswan at gmail dot com</li>
			</ul>	
		</div>
    </div>
    <div id="nav">
    	<ul>
    		<li><a href="home_work_1" /></li>
    	</ul>
    </div>
	<div id="content">		
    	<div id="workgall">			
        	<!--PHP--><?php
				$images = array("Work at home - August 2013|home_work_1.png|home_work_1|internal|This is a project completed for a recent assesment. This was built from a PSD and utilises HTML5 and CSS3 as well as some backend functionality for email validation. Minimum browser support was IE9.", "British Airways - Big British Invite - January 2013|BA_screen_1.png|#|modal-BBI_page|This project was part of a joint effort. I worked on the Itinerary page that users could add to by selecting activities in the ambassador modals, which I also worked on.", "British Airways - Home Page - 2012|BA_screen_2.png|http://www.ba.com|external|This project involved an upgrade to the template that creates the home page in TeamSite CMS. The template work made each banner a different fragment so that BA staff could all work on it at once.", "British Airways - Value Calculator - 2012|BA_screen_3.png|#|none|This was another templating project. It was similar to the hompage as it was taking a static page and turning it into dynamically genrated page according to business input. All the front end JavaScript was refactored by me as the first version was coded to a poor standard.", "Find me a good read - 2010|FMGR_screen.png|jan_site_refresh|internal|A site designed by myself for A Good Read Ltd. The site provides a book recommendation service by means of questionnaire.", "Student Survival System - 2009|case_screen.png|case_project|internal|Part of my final year project. The site was a group effort. I designed the layout of the site and built the login and password/PIN storage facility.", "Article System - 2007|article_screen.png|article_sys|internal|This is an example of my work from Uni. As part of an assigment the task was to create a site that users could log into and save and retrieve articles related to health. This piece of work was solely focused on functionality.");
				foreach ($images as $work){
					$workdets = preg_split("/[|]/", $work);
					$imgurl = 'images/'.$workdets[1];
					$title = $workdets[0];
					$url = $workdets[2];
					$link = $workdets[3];
					$modaldets = preg_split("/[-]/", $link);
					$linktype = $modaldets[0];
					if(isset($modaldets[1])){
						$modal = $modaldets[1];
					} else {
						$modal = "#";
					}
					$desc = $workdets[4];
					echo "<div class=\"workex\" style=\"background-image: url('".$imgurl."');\"><div class=\"workimgtxtwrap\"><div data-linktype=\"".$linktype."\" data-modal-url=\"".$modal."\" data-worklink=\"".$url."\" class=\"workimgtxt\"><h3 class=\"workextitle\">".$title."</h3><p>".$desc;
					if($linktype !== "modal" || $linktype !== "none"){
						echo " <a class=\"degradelink\" href=\"".$url."\" target=\"_blank\">View</a></p>";
					}
					echo "</div><div class=\"mobileShowHide\">a</div></div></div>";
				}			
			?><!--PHP END-->
        </div>
		<div class="clear"></div>
    </div>
	<div id="dialog"></div>
</div>
<div id="mobile"></div>
</body>
</html>
