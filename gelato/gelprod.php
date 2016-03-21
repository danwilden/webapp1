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
<script src="js-script.js" type="text/javascript"></script>
      <?php include('../menu.php'); ?>
</head>
<body>
<div class="form-style-10 col-7">
<h1>Gelato Production<span>Specify type made and the weight in each insert.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="gelatoproduction"/>
    <div class="row">
            <div class="col-xs-6">
	<div class="section"><span>1</span>Flavour &amp; Date</div>
    <div class="inner-wrap">
        <label>Flavour<select name="flavour">
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM gelatoflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label>Production Date<input type="date" name="Date" /></label>
		<label>Location<select name="Location"><option value="Robson">Robson</option><option value="Denman">Denman</option></select></label>
    </div>
	</div>
	<div class="col-xs-6">
	<div class="section"><span>2</span>Insert Weight Log</div>
    <div class="inner-wrap">
		<label tooltip="Enter the insert 1 weight" >Insert 1<input type="number" step="any" name="insert1" /></label>
		<select name="status1" style="display: none;"><option value="0">on-display</option><option value="1" >sold</option><option value="2">wasted</option></select>
        <label tooltip="Enter the insert 2 weight" >Insert 2<input type="number" step="any" name="insert2" /></label>
		<select name="status2" style="display: none;"><option value="0">on-display</option><option value="1">sold</option><option value="2">wasted</option></select>
		<label tooltip="Enter the insert 3 weight" >Insert 3<input type="number" step="any" name="insert3" /></label>
		<select name="status3" style="display: none;"><option value="0">on-display</option><option value="1">sold</option><option value="2">wasted</option></select>
		<label tooltip="Enter the insert 4 weight" >Insert 4<input type="number" step="any" name="insert4" /></label>
		<select name="status4" style="display: none;"><option value="0">on-display</option><option value="1">sold</option><option value="2">wasted</option></select>
		<label tooltip="Enter the insert 5 weight" >Insert 5<input type="number" step="any" name="insert5" /></label>
		<select name="status5" style="display: none;"><option value="0">on-display</option><option value="1">sold</option><option value="2">wasted</option></select>
		<label tooltip="Enter the insert 6 weight" >Insert 6<input type="number" step="any" name="insert6" /></label>
		<select name="status6" style="display: none;"><option value="0">on-display</option><option value="1">sold</option><option value="2">wasted</option></select>
		</div>
		</label>
    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	<a href="../loc.php">Go To Inventory</a></td>
	</div>
</form>
</div>
</div>
</form>
</body>
