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
<div class="form-style-10 col-7 table-responsive">
<h1>Dessert Managment<span>Creates Paremeters for Production and Inventory</span></h1>
<form method="post" name="frm">
<table class="table">
<tr>
<td colspan="3"><a href="desgenerate.php">Add New Desserts</a></td>
</tr>
<tr>
<th align="center">Select</th>
<th align="center">Dessert</th>
<th align="center">Pieces per Package</th>
<th align="center">Cost Per Package</th>
</tr>
<?php
 $res = $con->query("SELECT * FROM desserts");
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <tr >
   <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['ID']; ?>"  /></td>
   <td><?php echo $row['dessert']; ?></td>
   <td><?php echo $row['ppp']; ?></td>
   <td><?php echo $row['cpp']; ?></td>
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
    <td colspan="3" >
    <label><input type="checkbox" class="select-all" /> Check / Uncheck All</label></tr>
	<tr>
	<td colspan="3">
    <input type="button" onClick="edit_records();" alt="edit" value="Edit Flavours" />
	<input type="button" onClick="delete_records();" alt="delete" value="Delete Flavours"/>
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