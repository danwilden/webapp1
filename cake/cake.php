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
<div class="form-style-10 col-7">
<h1>Cake Inventory<span>Creates Paremeters for Production and Revenue</span></h1>
<form method="post" name="frm">
<table width="100%" align="center" border="0">
<tr>
<td colspan="3"><a href="generatecake.php">Add New Flavours</a></td>
</tr>
<tr>
<th align="center">Select</th>
<th align="center">Flavour</th>
</tr>
<?php
 $res = $con->query("SELECT * FROM cakeflavors");
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <tr >
   <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['ID']; ?>"  /></td>
   <td><?php echo $row['flavour']; ?></td>
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