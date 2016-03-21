<?php require_once("../session.php"); ?>
<?php require_once("../functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php confirm_manager();?>
<?php $layout_context = "admin"; ?>


<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<?php include('../menu.php'); ?>
<div id="main">
  <div id="page">
    <h2>Admin Menu</h2>
    <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
    <ul>
      <li><a href="manage_admins.php">Manage Users</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>


