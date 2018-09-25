<?php	
	// Sanitize input
	function sanitize($input) {
		if($input){
			$bad = array("'", '"');
			$safe = array('&#039;', '&quot;');
			$input = trim($input);
			$input = stripslashes($input);
			$input = htmlspecialchars($input);
			$input = str_replace($bad,$safe,$input);
			return $input;
		}
	}

    function validateDate($date) {
        $d = explode("-", $date);

        if(isset($d[0])) {
            if(!is_numeric($d[0]) || strlen($d[0]) != 4) $d = explode("-", "2000-13-32");
        }else{
            $d = explode("-", "2000-13-32");
        }
        if(isset($d[1])) {
            if(!is_numeric($d[1]) || strlen($d[1]) != 2) $d = explode("-", "2000-13-32");
        }else{
            $d = explode("-", "2000-13-32");
        }
        if(isset($d[2])) {
            if(!is_numeric($d[2]) || strlen($d[2]) != 2) $d = explode("-", "2000-13-32");
        }else{
            $d = explode("-", "2000-13-32");
        }
        if(isset($d[3])) {
            $d = explode("-", "2000-13-32");
        }
        return checkdate($d[1], $d[2], $d[0]);
    }

    function validateEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validateContact($contact){
        return preg_match("/^[(]{1}[0-9]{3}[)]{1} [0-9]{3}-[0-9]{4}$/", $contact);
    }

    function validateName($name){
        return preg_match("/^[a-zA-Z ]*$/",$name);
    }





?>