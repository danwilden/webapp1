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
<script src="js-script.js" type="text/javascript"></script>
</head>
    <body>
      <?php include('../menu.php'); ?>
</head>
<?php
 include_once '../dbcon.php';
?>
<body>
<div class="form-style-10 col-11">
<h1>Gelato Inventory for <?php echo $_SESSION['loc']; ?><span>Creates Paremeters for Production and Revenue</span></h1>
<form method="post" name="frm">
<table width="100%" align="center" border="0">

<tr>
<a href="../loc.php">Set Location</a> 
<th >ID</th>
<th >Flavour</th>
<th >Date</th>
<th >Insert 1</th>
<th >Insert 2</th>
<th >Insert 3</th>
<th >Insert 4</th>
<th >Insert 5</th>
<th >Insert 6</th>
</tr>
<?php
	$sql= "SELECT * FROM gelatoproduction WHERE Location = '{$_SESSION['loc']}' AND (status1 = '0' OR status2 = '0' OR status3 = '0' OR status4 = '0' OR status5 = '0' OR status6 = '0')";
 $res = $con->query($sql);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <!--builds the table of all the inserts in the gelato inventory that have not been sold or wasted group by flavor and production date-->
   <tr >
   <td><input type="hidden" name="id[]" value="<?php echo $row['ID']; ?>"</td>
   <td><?php echo $row['flavour']; ?></td>
   <td><?php echo $row['Date']; ?></td>
   <td><?php echo $row['insert1']; ?><select name="s1[]"><option value="0" <?php if ($row['status1']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status1']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status1']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   <td><?php echo $row['insert2']; ?><select name="s2[]"><option value="0" <?php if ($row['status2']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status2']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status2']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   <td><?php echo $row['insert3']; ?><select name="s3[]"><option value="0" <?php if ($row['status3']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status3']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status3']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   <td><?php echo $row['insert4']; ?><select name="s4[]"><option value="0" <?php if ($row['status4']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status4']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status4']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   <td><?php echo $row['insert5']; ?><select name="s5[]"><option value="0" <?php if ($row['status5']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status5']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status5']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   <td><?php echo $row['insert6']; ?><select name="s6[]"><option value="0" <?php if ($row['status6']=='0') { echo "SELECTED"; } ?>>on-display</option><option value="1" <?php if ($row['status6']=='1') { echo "SELECTED"; } ?>>Sold</option><Option value="2" <?php if ($row['status6']=='2') { echo "SELECTED"; } ?>>Wasted</option></select></td>
   
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
    <input type="button" onClick="update_records();" alt="edit" value="Update" />
	<input type="button" onClick="produce_records();" alt="produce" value="Make Gelato" />
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