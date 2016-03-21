<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Account Audits</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
<title>Clinic Monitor Sytem</title>
</head>
<body>

<Div>
<?php
require_once('functions.php');
 /*Configuration Settings*/

/*mysqli Settings*/
/*Database name*/
define('DB_NAME', 'testdb');

/*Database user*/
define('DB_USER', 'root');

/*Database user password*/
define('DB_PASSWORD', '');

/* Chances are you won't need to change the following three
settings. Only do so if you know what you're doing.*/

/*Database host*/
define('DB_HOST', 'localhost');

/*Database character set*/
define('DB_CHARSET', 'utf8');

/*Database collation*/
define('DB_COLLATE', '');
 


/*connect and Run the file*/
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
$db_selected = mysqli_select_db($con,DB_NAME);

		/*These are the main variables we'll use to process the form.*/
	/*formID and table name must match*/
	$table = $_POST['formID'];
	/*pulls data field names and data values and creates strings out of them*/
	$keys = implode(", ", (array_keys($_POST))); 
	$values = implode("', '", (array_values($_POST)));
	/*These are variables for our redirect.*/
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);
	
	/*These are the extra data fields we'll collect on form submission.*/
	$x_fields = 'timestamp';
	
	/*Insert out values into the database.*/
	
		$sql= "INSERT INTO $table ( $keys, $x_fields ) VALUES ('$values', now())";
	 
		if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_connect_error($con));
		}

	/*Close our database connection.*/
	mysqli_close($con);

	/*Redirect the user after a successful form submission*/
		header("Location: $referred?msg=1");
	 /*}*/

	mysqli_close($con);
	

?>
</div>
	</body>
</html>