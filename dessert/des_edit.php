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
<script src="js-script.js" type="text/javascript"></script>
</head>
    <body>
      <?php include('../menu.php'); ?>
</head>
<?php
include_once '../dbcon.php';


 if(isset($_POST['chk'])=="")
 {
  ?>
        <script>
  alert('At least one checkbox Must be Selected !!!');
  window.location.href='dessert.php';
  </script>
        <?php
 }
 $chk = $_POST['chk'];
 $chkcount = count($chk);
?>
<div class="form-style-10 col-7">
<form method="post" action="update_mul_des.php">
<h1>Update Flavours<span>Edit Details of Selected Items.</span></h1>
<table width="100%" align="center" border="0">
<tr>
<th>Dessert</th>
<th>Cost Per Piece</th>
<th>Pieces Per Package</th>
</tr>
<?php
for($i=0; $i<$chkcount; $i++)
{
$id = $chk[$i];
$sql=  "SELECT * FROM desserts WHERE id=".$id;
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
 {
  ?>
  <tr>
	<td>
		<input type="hidden" name="id[]" value="<?php echo $row['ID'];?>" />
		<input type="text" name="fn[]" value="<?php echo $row['dessert'];?>" />
	</td>
    <td>
		<input type="number" step="any" name="cn[]" value="<?php echo $row['cpp'];?>" />
	</td>
	<td>
		<input type="number" name="an[]" value="<?php echo $row['ppp'];?>" />
	</td>
  </tr>
  <?php 
 }   
}
?>
<tr>
<td colspan="2">
<button type="submit" name="savemul">Update all</button>&nbsp;
<a href="dessert.php">cancel</a>
</td>
</tr>
</table>
</form>
</div>
</body>
