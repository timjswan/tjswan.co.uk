<?php	
	
	if(isset($_GET['email'])){
		$email = $_GET['email'];
		
		if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
			echo "valid";
		} else {
			echo "invalid";
		}
	} else {
		echo "invalid";
	}

?>