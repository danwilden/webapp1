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
error_reporting(0);
include_once '../dbcon.php';

if(isset($_POST['save_mul']))
{  
 $total = $_POST['total'];
 
 for($i=1; $i<=$total; $i++)
 {
  $fn = $_POST["flavour$i"];
  $sql="INSERT INTO cakeflavors(flavour) VALUES('".$fn."')";
  $sql = $con->query($sql);  
 }
 
 if($sql)
 {
  ?>
        <script>
  alert('<?php echo $total." records were inserted !!!"; ?>');
  window.location.href='cake.php';
  </script>
        <?php
 }
 else
 {
  ?>
        <script>
  alert('error while inserting , TRY AGAIN');
  alert('<?php echo $total." records were inserted !!!"; ?>');
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
	<h1>Create New Flavours<span>Add Details about each Flavour.</span></h1>
    <input type="hidden" name="total" value="<?php echo $_POST["no_of_rec"]; ?>" />
 <table width="100%" align="center" border="0">
    
    <tr>
    <td colspan="3"><a href="cakegenerate.php">Add More Rows</a></td>
    </tr>
    
    <tr>
    <th></th>
    <th >Flavour</th>
    </tr>
 <?php
 for($i=1; $i<=$_POST["no_of_rec"]; $i++) 
 {
  ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><input type="text" name="flavour<?php echo $i; ?>" placeholder="flavour" /></td>
        </tr>
        <?php
 }
 ?>
    <tr>
    <td colspan="3">
    
    <button type="submit" name="save_mul">Insert all Records</button> 

    <a href="cake.php" >Cancel</a>
    
    </td>
    </tr>
    </table>
    </form>
 <?php
}
?>
</div>