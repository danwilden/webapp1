<?php
session_start(); // start up your PHP session! 
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Dessert Inventory</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="desjs-script.js" type="text/javascript"></script>
</head>
    <body>
      <?php include('../menu.php'); ?>
</head>
<?php
 include_once '../dbcon.php';
?>
<body>
<div class="form-style-10 col-11">
<h1>Dessert Inventory for <?php echo $_SESSION['loc']; ?><span>Enter information to confirm inventory</span></h1>
<form method="post" name="frm" class="table-responsive">
<table width="100%" align="center" border="0" class="table">

<tr>
<a href="../loc.php">Set Location</a> 
<th >ID</th>
<th >dessert</th>
<th >Date</th>
<th >Total Pieces</th>
<th >Pieces Sold</th>
<th >Pieces Wasted</th>
</tr>
<?php
	$sql= "SELECT * FROM dessertproduction WHERE Location = '{$_SESSION['loc']}' ";
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
   <td><?php echo $row['dessert']; ?></td>
   <td><?php echo $row['Date']; ?></td>
   <td><?php echo $row['ppp']; ?> </td> 
   <td><input type="number" name="np_sold" value="<?php echo $row['np_sold']; ?>"/></td>
   <td><input type="number" name="np_wasted" value="<?php echo $row['np_wasted']; ?>"/></td>
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
    <input type="button" onClick="update_status();" alt="edit" value="Update" />
	<input type="button" onClick="produce_records();" alt="produce" value="Add Desserts" />
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