<?php require_once("../session.php"); ?>
<?php require_once("../dbcon.php"); ?>
<?php require_once("../functions.php"); ?>
<?php require_once("validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_manager(); ?>
<?php
  $admin = find_admin_by_id($_GET["id"]);
  
  if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_admins.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $admin["id"];
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
	$fname=$_POST["fname"];
    $lname=$_POST["lname"];
	$access=$_POST["access"];
	
    $query  = "UPDATE admins SET ";
    $query .= "username = '{$username}', ";
    $query .= "hashed_password = '{$hashed_password}' ";
	$query .= "fname = '{$fname}', ";
	$query .= "lname = '{$lname}', ";
	$query .= "access = '{$access}', ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Admin updated.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include('../menu.php'); ?>
<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit Admin: <?php echo htmlentities($admin["username"]); ?></h2>
    <form action="edit_admin.php?id=<?php echo urlencode($admin["ID"]); ?>" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>" />
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
      <input type="submit" name="submit" value="Edit Admin" />
    </form>
    <br />
    <a href="manage_admins.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
