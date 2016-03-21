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
<div class="form-style-10 col-7">
<h1>Temperature Controls<span>Record the high and low.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="DailyTemperatureControl"/>
    <div class="row">
	<div class="section"><span>1</span>Location</div>
    <div class="inner-wrap">
        <label>Location<select name="Location"><option value="Robson">Robson</option><option value="Denman">Denman</option></select></label>
    </div>
	<div class="row">
	<div class="col-xs-6">
	<div class="section"><span>2</span>Gelato Show Case</div>
    <div class="inner-wrap">
		<label tooltip="Enter the High Temp" >High Temperature<input type="number" name="gHigh" /></label>
        <label tooltip="Enter the Low Temp" >Low Temperature<input type="number" name="gLow" /></label>
		</div>
	</div>
	<div class="col-xs-6">
	<div class="section"><span>2</span>Pastry Display</div>
    <div class="inner-wrap">
		<label tooltip="Enter the High Temp" >High Temperature<input type="number" name="pHigh" /></label>
        <label tooltip="Enter the Low Temp" >Low Temperature<input type="number" name="pLow" /></label>
		</div>	
    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	</div>
	</div>
	</div>
</form>
</div>