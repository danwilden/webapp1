<?php

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	function mysql_prep($string) {
		global $con;
		
		$escaped_string = mysqli_real_escape_string($con, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
	
	function find_all_subjects($public=true) {
		global $con;
		
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		if ($public) {
			$query .= "WHERE visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($con, $query);
		confirm_query($subject_set);
		return $subject_set;
	}
	
	function find_pages_for_subject($subject_id, $public=true) {
		global $con;
		
		$safe_subject_id = mysqli_real_escape_string($con, $subject_id);
		
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE subject_id = {$safe_subject_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$page_set = mysqli_query($con, $query);
		confirm_query($page_set);
		return $page_set;
	}
	
	function find_all_admins() {
		global $con;
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "ORDER BY username ASC";
		$admin_set = mysqli_query($con, $query);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	function find_subject_by_id($subject_id, $public=true) {
		global $con;
		
		$safe_subject_id = mysqli_real_escape_string($con, $subject_id);
		
		$query  = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = {$safe_subject_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "LIMIT 1";
		$subject_set = mysqli_query($con, $query);
		confirm_query($subject_set);
		if($subject = mysqli_fetch_assoc($subject_set)) {
			return $subject;
		} else {
			return null;
		}
	}

	function find_page_by_id($page_id, $public=true) {
		global $con;
		
		$safe_page_id = mysqli_real_escape_string($con, $page_id);
		
		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = {$safe_page_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "LIMIT 1";
		$page_set = mysqli_query($con, $query);
		confirm_query($page_set);
		if($page = mysqli_fetch_assoc($page_set)) {
			return $page;
		} else {
			return null;
		}
	}
	
	function find_admin_by_id($admin_id) {
		global $con;
		
		$safe_admin_id = mysqli_real_escape_string($con, $admin_id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = {$safe_admin_id} ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($con, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

	function find_admin_by_username($username) {
		global $con;
		
		$safe_username = mysqli_real_escape_string($con, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($con, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

	function find_default_page_for_subject($subject_id) {
		$page_set = find_pages_for_subject($subject_id);
		if($first_page = mysqli_fetch_assoc($page_set)) {
			return $first_page;
		} else {
			return null;
		}
	}
	
	function find_selected_page($public=false) {
		global $current_subject;
		global $current_page;
		
		if (isset($_GET["subject"])) {
			$current_subject = find_subject_by_id($_GET["subject"], $public);
			if ($current_subject && $public) {
				$current_page = find_default_page_for_subject($current_subject["id"]);
			} else {
				$current_page = null;
			}
		} elseif (isset($_GET["page"])) {
			$current_subject = null;
			$current_page = find_page_by_id($_GET["page"], $public);
		} else {
			$current_subject = null;
			$current_page = null;
		}
	}

	// navigation takes 2 arguments
	// - the current subject array or null
	// - the current page array or null
	function navigation($subject_array, $page_array) {
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects(false);
		while($subject = mysqli_fetch_assoc($subject_set)) {
			$output .= "<li";
			if ($subject_array && $subject["id"] == $subject_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= htmlentities($subject["menu_name"]);
			$output .= "</a>";
			
			$page_set = find_pages_for_subject($subject["id"], false);
			$output .= "<ul class=\"pages\">";
			while($page = mysqli_fetch_assoc($page_set)) {
				$output .= "<li";
				if ($page_array && $page["id"] == $page_array["id"]) {
					$output .= " class=\"selected\"";
				}
				$output .= ">";
				$output .= "<a href=\"manage_content.php?page=";
				$output .= urlencode($page["id"]);
				$output .= "\">";
				$output .= htmlentities($page["menu_name"]);
				$output .= "</a></li>";
			}
			mysqli_free_result($page_set);
			$output .= "</ul></li>";
		}
		mysqli_free_result($subject_set);
		$output .= "</ul>";
		return $output;
	}

	function public_navigation($subject_array, $page_array) {
		$output = "<ul class=\"subjects\">";
		$subject_set = find_all_subjects();
		while($subject = mysqli_fetch_assoc($subject_set)) {
			$output .= "<li";
			if ($subject_array && $subject["id"] == $subject_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"index.php?subject=";
			$output .= urlencode($subject["id"]);
			$output .= "\">";
			$output .= htmlentities($subject["menu_name"]);
			$output .= "</a>";
			
			if ($subject_array["id"] == $subject["id"] || 
					$page_array["subject_id"] == $subject["id"]) {
				$page_set = find_pages_for_subject($subject["id"]);
				$output .= "<ul class=\"pages\">";
				while($page = mysqli_fetch_assoc($page_set)) {
					$output .= "<li";
					if ($page_array && $page["id"] == $page_array["id"]) {
						$output .= " class=\"selected\"";
					}
					$output .= ">";
					$output .= "<a href=\"index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= htmlentities($page["menu_name"]);
					$output .= "</a></li>";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}

			$output .= "</li>"; // end of the subject li
		}
		mysqli_free_result($subject_set);
		$output .= "</ul>";
		return $output;
	}

	function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	function manager() {
		if($_SESSION['access']=="All"){
			return true;
		} else {
			// admin not found
			return false;
		}
	}
	
	function confirm_manager() {
		if (!manager()) {
			redirect_to("../home.php");
		}
	}
/*Checks the validity of the retrieved IP address.*/
function f_validIP($ip) {
 
	if (!empty($ip) && ip2long($ip)!=-1) {
		$reserved_ips = array (	 
			array('0.0.0.0','2.255.255.255'),		 
			array('10.0.0.0','10.255.255.255'),		 
			array('127.0.0.0','127.255.255.255'),		 
			array('169.254.0.0','169.254.255.255'),		 
			array('172.16.0.0','172.31.255.255'),		 
			array('192.0.2.0','192.0.2.255'),		 
			array('192.168.0.0','192.168.255.255'),		 
			array('255.255.255.0','255.255.255.255')	 
		);
	 
		foreach ($reserved_ips as $r) { 
			$min = ip2long($r[0]);			 
			$max = ip2long($r[1]);			 
			if ((ip2long($ip) >= $min) && (ip2long($ip) <= $max)) return false;
		}
		
		return true;
	} else {
		return false;
	}
 }

/*Gets the IP address of the current user for storage in the database.*/
function f_getIP() {
	if (f_validIP($_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	 
	foreach (explode(",",$_SERVER["HTTP_X_FORWARDED_FOR"]) as $ip) {	 
		if (f_validIP(trim($ip))) {		 
			return $ip;		 
		}	 
	}
	 
	if (f_validIP($_SERVER["HTTP_X_FORWARDED"])) { 
		return $_SERVER["HTTP_X_FORWARDED"];	 
	} elseif (f_validIP($_SERVER["HTTP_FORWARDED_FOR"])) {	 
		return $_SERVER["HTTP_FORWARDED_FOR"];	 
	} elseif (f_validIP($_SERVER["HTTP_FORWARDED"])) {	 
		return $_SERVER["HTTP_FORWARDED"];	 
	} elseif (f_validIP($_SERVER["HTTP_X_FORWARDED"])) {	 
		return $_SERVER["HTTP_X_FORWARDED"];	 
	} else {
		return $_SERVER["REMOTE_ADDR"];	 
	}
 }



/*Cleans an array to protect against injection attacks.*/
function f_clean($array) {
    return array_map('mysqli_real_escape_string', $array);
}

/*Connects to and selects the specified database with the specified user.*/
function f_sqlConnect($user, $pass, $db) {
	$link = mysqli_connect('localhost', $user, $pass);

	if (!$link) {
		die('Could not connect: ' . mysqli_error());
	}

	$db_selected = mysqli_select_db($link, $db);

	if (!$db_selected) {
		die('Can\'t use ' . $db . ': ' . mysqli_error());
	}
}

/*Checks to see if the specified table exists and if it doesn't, creates it.*/
function f_tableExists($tablename, $database = false, $con) {

    if(!$database) {
        $res = mysqli_query($con,"SELECT DATABASE()");
        $database = mysqli_use_result($res, 0);
    }

    $res = mysqli_query($con, "
        SELECT COUNT(*) AS count 
        FROM information_schema.tables 
        WHERE table_schema = '$database' 
        AND table_name = '$tablename'
    ");

    return mysqli_use_result($con);

}

/*Checks to see if the specified field exists and if it doesn't, creates it.*/
function f_fieldExists($con, $table, $column, $column_attr = "VARCHAR( 255 ) NULL" ) {
	$exists = false;
	$columns = mysqli_query($con,"show columns from $table");
	while($c = mysqli_fetch_assoc($columns)){
		if($c['Field'] == $column){
			$exists = true;
			break;
		}
	}
	if(!$exists){
		mysqli_query($con,"ALTER TABLE `$table` ADD `$column`  $column_attr");
	}
}
?>

