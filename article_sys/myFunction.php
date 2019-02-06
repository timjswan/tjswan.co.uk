<?php

//provides connection detilas and db type
function getConnection(){
	$dbtype = 'mysql';
	$dbname = 'webarticle';
	$user = 'webarticle';
	$pass = 'webarticle';

	try
	{
		$db = new PDO("$dbtype:host=localhost;dbname=$dbname", $user, $pass);
		return $db;
	}

	catch (PDOexception $e)
	{
		echo 'Database connection error: '.$e->getMessage();
		die();
	}
};

//loops through checked articles then enters them into database.
function sendToDB($artoption, $xmlurl){
	$db = getConnection();
	$feed = simplexml_load_file($xmlurl);
	foreach ($artoption as $artdetails){
		$user = $_SESSION['email'];
		$artarray = splitArtDetails($artdetails);
		$arturl = $artarray[1];
		foreach ($feed->channel->item as $item){
			if($arturl == $item->link){
				$link = reSQLbadChars($item->link);
				$title = reSQLbadChars($item->title);
				$category = reSQLbadChars($item->category);
				$desc = reSQLbadChars($item->description);		
				$sql = 'INSERT INTO article (subscriberID, link, title, category, body) VALUES (\''.$user.'\', \''.$link.'\', \''.$title.'\', \''.$category.'\', \''.$desc.'\')';
				//echo $sql."<br />";
				try {
					$stmt = $db->exec($sql);
				}
				catch (PDOException $e){
					echo $e->getmessage();
				}
			}//endif
		}//end inner foreach		
	}//end foreach
}//end of function

function reSQLbadChars($data) {
	$fchars = array('/\"/', '/,/', '/\'/');
	$dataok = preg_replace($fchars, '', $data);
	return $dataok;
}

//splits the value of a checkbox by using the parameter % to determine the article link and title for DB entry.
function splitArtDetails($rawdata){
	$result = preg_split('/[%]/', $rawdata);
	return $result;
}

//splits the url so that the article number can be determined. This is so $fileopen can open and read the html file
function splitURL($rawurl){
	$splitlink = preg_split('#[/]#', $rawurl);
	return $splitlink;
}
?>
