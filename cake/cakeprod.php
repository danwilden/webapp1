<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Gelato Production</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="cakejs-script.js" type="text/javascript"></script>
</head>
      <?php include('../menu.php'); ?>
</head>
<body>
<div class="form-style-10 col-7">
<h1>Cake Production<span>Specify type made and the weight in each insert.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="cakeproduction"/>
    <div class="row">
            <div>
	<div class="section"><span>1</span>Cake Details</div>
    <div class="inner-wrap">
        <label>Flavour<select name="flavour1">
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label>Flavour2<select name="flavour2"><option name"null"></option>
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
			<label>Size<select name="size"><option value="mini">Mini</option><option value="8">8"</option><option value="10">10"</option><option value="12">12"</option><option value="custom">Custom</option></select></label>
		<label>Production Date<input type="date" name="Date" /></label>
		<label>Location<select name="Location"><option value="Robson">Robson</option><option value="Denman">Denman</option></select></label>
		<select name="status" style="display: none;"><option value="0">on-display</option><option value="1" >sold</option><option value="2">wasted</option></select>
    </div>
	</div>
    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	<a href="../loc.php">Go To Inventory</a>
	</div>
</form>
</div>
</div>
</form>
</body>
