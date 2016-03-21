<?php
session_start(); // start up your PHP session! 
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Gelato Inventory</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="cakejs-script.js" type="text/javascript"></script>
</head>
    <body>
      <?php include('../menu.php'); ?>
</head>
<?php
 include_once '../dbcon.php';
?>
<body>
<div class="form-style-10 col-11">
<h1>Cake Inventory for <?php echo $_SESSION['loc']; ?><span>Keep the inventory up to date.</span></h1>
<form method="post" name="frm">
<table width="100%" align="center" border="0">

<tr>
<a href="../loc.php">Set Location</a> 
<th style="text-align:center;"></th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Flavour1</th>
<th style="text-align:center;">Flavour2</th>
<th style="text-align:center;">Size</th>
<th style="text-align:center;">Status</th>
</tr>
<?php
	$sql= "SELECT * FROM cakeproduction WHERE Location = '{$_SESSION['loc']}' AND (status = '0')";
	print($sql);
 $res = $con->query($sql);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <!--builds the table of all the inserts in the gelato inventory that have not been sold or wasted group by flavor and production date-->
   <tr >
   <td><input type="hidden" name="id[]" value="<?php echo $row['ID']; ?>"/></td>
   <td style="text-align:center;"><?php echo $row['Date']; ?></td>
   <td style="text-align:center;"><?php echo $row['flavour1']; ?></td>
   <td style="text-align:center;"><?php echo $row['flavour2']; ?></td>
   <td style="text-align:center;"><?php echo $row['size']; ?></td>
   <td style="text-align:center;"><select name="s1[]"><option value="0" <?php if ($row['status']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   </tr>
   <?php
  }
 }
 else
 {
  ?>
        <tr>
        <td colspan="3"> No Records Found ...</td>
        </tr>
        <?php
 }
?>

<?php

if($count > 0)
{
 ?>
	<tr>
	<td colspan="3">
	<!--relies on the javascript director to guide this to update_gel.php-->
	<input type="hidden" name="id[]" value="<?php echo $_POST['loc']; ?>"/>
    <input type="button" onClick="update_status();" alt="edit" value="Update" />
	<input type="button" onClick="produce_records();" alt="produce" value="Make Cake" />
	</td>
 </tr> 
</div> 
    <?php
}
?>

</table>
</form>
</div>
</body>
</html>