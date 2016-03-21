<?php
session_start(); // start up your PHP session! 
 include_once 'dbcon.php';
?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Gelato Inventory</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js-script.js" type="text/javascript"></script>
</head>
    <body>
      <?php include('menu2.php'); ?>
	  
</head>

<body>
<div class="form-style-10 col-7">
<form method="post">
<h1>Create New Flavours<span>Select number to create.</span></h1>
<table width="50%" align="center" border="0">

<tr>
<td>
<select name="loc" ><option value="Robson">Robson</option><option value="Denman">Denman</option></select>
</td>
</tr>

<tr>
<td><button type="submit" name="btn-gen-form">Filter</button> 
&nbsp;
<a href="index.php">Return</a>
</td>
</tr>

</table>
<?php 
 if (isset($_POST['btn-gen-form'])) { 
 $_SESSION['loc'] = $_POST['loc'];
 } 
?> 
<input type="button" onClick="window.location.href='cake/cakecomp.php'" alt="edit" value="Cake Inventory" />
<input type="button" onClick="window.location.href='gelato/gelcomp.php'" alt="edit" value="Gelato Inventory" />
<input type="button" onClick="window.location.href='dessert/descomp.php'" alt="edit" value="Dessert Inventory" />
<strong><?php echo $_SESSION['loc'];?></strong>

</form>
