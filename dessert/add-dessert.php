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
error_reporting(0);
include_once '../dbcon.php';

if(isset($_POST['save_mul']))
{  
 $total = $_POST['total'];
  
 for($i=1; $i<=$total; $i++)
 {
  $fn = $_POST["dessert$i"];
  $cn = $_POST["ppp$i"];
  $an = $_POST["cpp$i"];
  $sql="INSERT INTO desserts(dessert,ppp,cpp) VALUES('".$fn."','".$cn."','".$an."')";
  $sql = $con->query($sql);  
 }
 
 if($sql)
 {
  ?>
        <script>
  alert('<?php echo $total." records was inserted !!!"; ?>');
  window.location.href='index.php';
  </script>
        <?php
 }
 else
 {
  ?>
        <script>
  alert('error while inserting , TRY AGAIN');
  </script>
        <?php
 }
}
?>

<div class="form-style-10 col-7">
<?php
if(isset($_POST['btn-gen-form']))
{
 ?>
    <form method="post">
	<h1>Add New Desserts<span>Add Details about each dessert.</span></h1>
    <input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
 <table width="100%" align="center" border="0">
    
    <tr>
    <td colspan="3"><a href="desgenerate.php">Add More Rows</a></td>
    </tr>
    
    <tr>
    <th></th>
    <th >Dessert</th>
    <th>Pieces Per Package</th>
	<th>Cost Per Package</th>
    </tr>
 <?php
 for($i=1; $i<=$_POST["no_of_rec"]; $i++) 
 {
  ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><input type="text" name="dessert<?php echo $i; ?>" placeholder="dessert" /></td>
        <td><input type="number" name="ppp<?php echo $i; ?>" placeholder="Pieces per package" /></td>
		<td><input type="number" step="any" name="cpp<?php echo $i; ?>" placeholder="Cost per Package" /></td>
        </tr>
        <?php
 }
 ?>
    <tr>
    <td colspan="3">
    
    <button type="submit" name="save_mul">Insert all Records</button> 

    <a href="dessert.php" >Cancel</a>
    
    </td>
    </tr>
    </table>
    </form>
 <?php
}
?>
</div>