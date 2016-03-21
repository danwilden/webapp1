<?php
require_once('../config.php');
require_once('../functions.php');

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	/* $_POST = f_clean($_POST); */
	$table = $_POST['formID'];
	/*These are the main variables we'll use to process the form.*/


	/*These are variables for our redirect.*/
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);
	
$id = $_POST['id'];
$flav = $_POST['flavour'];
$cost = $_POST['costpergm'];
$chk = $_POST['chk'];
$chkcount = count($id);
	
	/*Insert out values into the database.*/
For($i=0;$i<$count;$i++){
$sql1="UPDATE $table SET flavour='$flavour[$i]', costpergm='$costpergm[$i]', avgprod='$avgprod[$i]' WHERE id='$id[$i]'";
$result1=mysqli_query($con, $sql1);
}
	if (!mysqli_query($con, $sql1)) {
		die('Error: ' . mysqli_error($con));
	}

	/*Close our database connection.*/
	mysqli_close($con);

	/*Redirect the user after a successful form submission*/
		header("Location: $referred?msg=1");
	
?>
