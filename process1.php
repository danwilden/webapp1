<?php
require_once('config.php');
require_once('functions.php');

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	/* $_POST = f_clean($_POST); */

	/*These are the main variables we'll use to process the form.*/
	$table = $_POST['formID'];
	$keys = implode(", ", (array_keys($_POST))); 
	$values = implode("', '", (array_values($_POST)));

	/*These are variables for our redirect.*/
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);
	
	/*These are the extra data fields we'll collect on form submission.*/
	$x_fields = 'timestamp';

	/*Check to see if the table exists and if it doesn't create it.*/
	if ( !f_tableExists($table, DB_NAME, $con) ) {
		$sql = "CREATE TABLE $table (
			ID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(ID),
			timestamp int NOT NULL
		)";
		
		$result = mysqli_query($con, $sql);
		
		/* if (!$result) {
			die('Invalid query: ' . mysqli_error($con));
		} */
		
	} 

	/*Check to see if the fields specified in the form exist and if they don't, create them.*/
	foreach ($_POST as $key => $value) {
		$column = mysqli_real_escape_string($con, $key);
		$alter = f_fieldExists($con, $table, $column, $column_attr = "VARCHAR( 255 ) NULL" );
		
		if (!$alter) {
			echo 'Unable to add column: ' . $column;
		}
	}

	/*Insert out values into the database.*/
	$sql="INSERT INTO $table ($keys, $x_fields) VALUES ('$values', now())";

	if (!mysqli_query($con, $sql)) {
		die('Error: ' . mysqli_error($con));
	}

	/*Close our database connection.*/
	mysqli_close($con);
