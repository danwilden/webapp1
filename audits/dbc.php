<?php require_once("../session.php"); ?>
<?php require_once('../dbcon.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Bathroom Log</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
</head>
    <body>
      <?php include('../menu.php'); ?>
<div class="form-style-10 col-7">
<h1>Daily Bathroom Check for <?php echo $_SESSION['loc']; ?><span>Complete hourly review of facility.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="DailyBathroomLog"/>
    <div class="row">
	<div class="section"><span>1</span>Date &amp; Time</div>
    <div class="inner-wrap">
        <input type="hidden" name="location" value="<?php echo $_SESSION['loc']; ?>"/>
		<label>User<input type="text"  name="user" value="<?php echo $_SESSION['username']; ?>"/></label>
		<label>Date<input id="datePicker" type="date" name="Date"/></label>
        <label>Time <input type="time"  value="12:00" step="3600" name="user_time" /></label>
    </div>
	</div>

	<div class="row">
	<div class="col-xs-6">
	<div class="section"><span>2</span>Men's Bathroom</div>
    <div class="inner-wrap">
		<label tooltip="Enter the Bathroom Status" >Status<select name="m_status" onchange="showfield(this.options[this.selectedIndex].value, 'div2')"><option value="Good">Good</option><option value="Problem">Problem</option></select></label>
        <div id="div2" style="display:none;"><label tooltip="Enter the problem" >Problem<input type="text" name="m_problem" /></label></div>
		</div>
		</label>
	</div>
	<div class="col-xs-6">
	<div class="section"><span>3</span>Women's Bathroom</div>
    <div class="inner-wrap">
		<label tooltip="Enter the Bathroom Status" >Status<select name="w_status" onchange="showfield(this.options[this.selectedIndex].value, 'div3')"><option value="Good">Good</option><option value="Problem">Problem</option></select></label>
        <div id="div3" style="display:none;"><label tooltip="Enter the problem" >Problem<input type="text" name="w_problem" /></label></div>
		</div>
		</label>
    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	</div>
	</div>
</form>
<div class="responsive-table">
<table class="table">

<tr>
<a href="../loc.php">Set Location</a> 
<th >ID</th>
<th >Checker</th>
<th >Date</th>
<th >Time</th>
<th >Men's</th>
<th >Issues</th>
<th >Ladies'</th>
<th >Issues</th>
</tr>
<?php
	$sql= "SELECT * FROM dailybathroomlog WHERE location = '{$_SESSION['loc']}' AND Date = CURDATE()";
 $res = $con->query($sql);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <!--builds the table of all the inserts in the gelato inventory that have not been sold or wasted group by flavor and production date-->
   <tr >
		<td><?php echo $row['ID']; ?></td>
		<td><?php echo $row['user']; ?></td>
		<td><?php echo $row['Date']; ?></td>
		<td><?php echo $row['user_time']; ?></td>
		<td><?php echo $row['m_status']; ?></td>
		<td><?php echo $row['m_problem']; ?></td>
		<td><?php echo $row['w_status']; ?></td>
		<td><?php echo $row['w_problem']; ?></td>	
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
function showfield(name, number){
  var element = document.getElementById(number);
  if(name=='Problem')element.style.display = 'block';
  else element.style.display = 'none';
}
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