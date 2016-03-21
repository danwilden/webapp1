<?php require_once("../session.php"); ?>
<?php require_once("../dbcon.php"); ?>
<?php require_once("../functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
	$fname=$_POST["fname"];
    $lname=$_POST["lname"];
	$access=$_POST["access"];
    $query  = "INSERT INTO admins (";
    $query .= "  username, hashed_password, fname, lname, access";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}', '{$fname}', '{$lname}', '{$access}'";
    $query .= ")";
    $result = mysqli_query($con, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Admin created.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<?php include('../menu.php'); ?>
<div id="main">
  <div id="page" class="form-style-10 col-7">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Create User</h2>
    <form action="new_admin.php" method="post">
      <p>Username:
        <input type="text" name="username" value="" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
	  <p>First Name:
        <input type="text" name="fname" value="" />
      </p>
      <p>Last Name:
        <input type="text" name="lname" value="" />
      </p>
	  <p>Access:
        <select name="access"><option value="All">All</option><option value="staff">Staff</option>
      </p>
      <input type="submit" name="submit" value="Create User" />
    </form>
    <br />
    <a href="manage_admins.php">Cancel</a>
  </div>
</div>

