<?php require_once("../session.php"); ?>
<?php require_once("../dbcon.php"); ?>
<?php require_once("../functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $admin_set = find_all_admins();
?>

<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<?php include('../menu.php'); ?>

<div id="main">
  <div id="navigation">
		<br />
		<a href="admin.php">&laquo; Main menu</a><br />
  </div>
  <div id="page">
    <?php echo message(); ?>
    <h2>Manage Admins</h2>
    <table>
      <tr>
        <th style="text-align: left; width: 200px;">Username</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
      <tr>
        <td><?php echo htmlentities($admin["username"]); ?></td>
        <td><a href="edit_admin.php?id=<?php echo urlencode($admin["ID"]); ?>">Edit</a></td>
        <td><a href="delete_admin.php?id=<?php echo urlencode($admin["ID"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>
    </table>
    <br />
    <a href="new_admin.php">Add new admin</a>
  </div>
</div>

