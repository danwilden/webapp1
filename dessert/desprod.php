<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Dessert Production</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js-script.js" type="text/javascript"></script>
</head>
      <?php include('../menu.php'); ?>
</head>
<body>
<div class="form-style-10 col-7">
<h1>Dessert Production<span>Specify Details about the Dessert.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="dessertproduction"/>
    <div class="row">
            <div>
	<div class="section"><span>1</span>Flavour &amp; Date</div>
    <div class="inner-wrap">
        <label>Dessert<select name="dessert">
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT dessert FROM desserts");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['dessert'] .">" . $row['dessert'] . "</option>";
			}
			?>
			</select></label>
		<label>Production Date<input type="date" name="Date" /></label>
		<label>Location<select name="Location"><option value="Robson">Robson</option><option value="Denman">Denman</option></select></label>
		<label>Pieces Per Package<input type="number" name="ppp"/></label>
		<label># of Packages<input type="number" name="number of packages"/></label>
		<input style="display:none;" type="number" name="np_sold" value="0" />
		<input style="display:none;" type="number" name="np_wasted" value="0" />

    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	<a href="../loc.php">Go To Inventory</a></td>
	</div>
	</div>
</form>
</div>
</div>
</form>
</body>
