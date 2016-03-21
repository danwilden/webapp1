<?php require_once("../session.php"); ?>
<?php require_once('../dbcon.php'); ?>
<?php require_once("../functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_admin = attempt_login($username, $password);
		print($found_admin);
    if ($found_admin) {
      // Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["ID"];
			$_SESSION["username"] = $found_admin["username"];
			$_SESSION["access"] = $found_admin["access"];
			$access=$found_admin["access"];
			if($access="All"){
				redirect_to("admin.php");
			}else{redirect_to("../home.php");}
	} else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<?php include('../menu.php'); ?>
<div id="main">
  <div id="page" class="form-style-10 col-7">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Login</h2>
    <form action="login.php" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>
</div>

