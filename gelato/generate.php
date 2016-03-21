<?php
 include_once '../dbcon.php';
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

<body>
<div class="form-style-10 col-7">
<form method="post" action="add-data.php">
<h1>Create New Flavours<span>Select number to create.</span></h1>
<table width="100%" align="center" border="0">

<tr>
<td>
<input type="text" name="no_of_rec" placeholder="how many flavours to enter ? i.e. 1 , 2 , 3 , 5" maxlength="2" pattern="[0-9]+" required />
</td>
</tr>

<tr>
<td><button type="submit" name="btn-gen-form">Create</button> 
&nbsp;
<a href="index.php">Return</a>
</td>
</tr>

</table>

</form>