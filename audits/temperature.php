<?php require_once("../session.php"); ?>
<?php require_once('../dbcon.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Temperature Logs</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
</head>
    <body>
      <?php include('../menu.php'); ?>
<div class="form-style-10 col-7">
<h1>Temperature Logs<span>Record the high and low.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="DailyTemperatureLog"/>
    <div class="row">
	<div class="section"><span>1</span>Date &amp; Time</div>
    <div class="inner-wrap">
        <input type="hidden" name="location" value="<?php echo $_SESSION['loc']; ?>"/>
		<label>User<input type="text"  name="user" value="<?php echo $_SESSION['username']; ?>"/></label>
		<label>Date<input id="datePicker" type="date" name="Date" /></label>
        <label>Time <input type="time"  value="12:00" step="3600" name="user_time" /></label>
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
</form>
</div>
<div class="responsive-table">
<table class="table" id="mytable">

<tr>
<a href="../loc.php">Set Location</a> 
<th >ID</th>
<th >Checker</th>
<th >Date</th>
<th >Time</th>
<th >Gelato High</th>
<th >Gelato Low</th>
<th >Pastry High</th>
<th >Pastry Low</th>
</tr>
<tr>
<td></td>
<td ></td>
<td ></td>
<td ></td>
<td class="Warning"style="display:none; color: red;">Warning</td>
<td class="Warning1"style="display:none;">Warning</td>
<td class="Warning2"style="display:none;">Warning</td>
<td class="Warning3"style="display:none;">Warning</td>

</tr>
<?php
	
	$sql= "SELECT * FROM dailytemperaturelog WHERE location = '{$_SESSION['loc']}' AND Date = CURDATE()";
 $res = $con->query($sql);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <!--builds the table of all the inserts in the gelato inventory that have not been sold or wasted group by flavor and production date-->
   <tr >
		<td ><?php echo $row['ID']; ?></td>
		<td ><?php echo $row['user']; ?></td>
		<td ><?php echo $row['Date']; ?></td>
		<td ><?php echo $row['user_time']; ?></td>
		<td class="cell1"><?php echo $row['gHigh']; ?></td>
		<td class="cell2"><?php echo $row['gLow']; ?></td>
		<td class="cell3"><?php echo $row['pHigh']; ?></td>
		<td class="cell4"><?php echo $row['pLow']; ?></td>	
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
	<td colspan="3">
	<!--relies on the javascript director to guide this to update_gel.php-->
    <input type="button" onClick="update_records();" alt="edit" value="Update" />
	<input type="button" onClick="produce_records();" alt="produce" value="Make Gelato" />
	</td>
 </tr> 
</div> 
    <?php
}

?>

</table>
</div>
</div>

<?php
	$sql1= "SELECT * FROM dailytemperaturecontrol WHERE location = '{$_SESSION['loc']}'";
 $res1 = $con->query($sql1);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res1->fetch_array())
  {
   ?>
   <!--builds the table of all the inserts in the gelato inventory that have not been sold or wasted group by flavor and production date-->
		<div style="display:none;" class="gHigh" value="<?php echo $row['gHigh']; ?>"><?php echo $row['gHigh']; ?></div>
		<div style="display:none;" class="gLow" value="<?php echo $row['gLow']; ?>"><?php echo $row['gLow']; ?></div>
		<div style="display:none;" class="pHigh" value="<?php echo $row['pHigh']; ?>"><?php echo $row['pHigh']; ?></div>
		<div style="display:none;" class="pLow" value="<?php echo $row['pLow']; ?>"><?php echo $row['pLow']; ?></div>
   </tr>
 <?php
 }
 }
 ?>
<script type="text/javascript">
function showfield(name, number){
  var element = document.getElementById(number);
  if(name=='Fail')element.style.display = 'block';
  else element.style.display = 'none';
}
var high = $( "div.gHigh" ).text();
var low = $( "div.gLow" ).text();
var hig = $( "div.pHigh" ).text();
var lo = $( "div.pLow" ).text();
console.log(high,low,hig,lo);
$('.cell1').each(function(i, n) {
   if($(n).text() > high) $(".Warning").css('display', 'block');
});
$('.cell2').each(function(i, n) {
   if($(n).text() < low) $(".Warning1").css('display', 'block');
});

$('.cell3').each(function(i, n) {
   if($(n).text() > hig) $(".Warning2").css('display', 'block');
});
$('.cell4').each(function(i, n) {
   if($(n).text() <lo) $(".Warning3").css('display', 'block');
});
$(document).ready(function() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    $("#datePicker").attr("value", today);
});
</script>
</body>
</html>