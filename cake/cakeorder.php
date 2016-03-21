<?php require_once("../session.php"); ?>
<?php require_once('../dbcon.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Cake Order Form</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker {
    background: #333;
    border: 1px solid #555;
    color: #EEE;
}
</style>
</head>
    <body>
      <?php include('../menu.php'); ?>
<div class="form-style-10 col-7">
<h1>Cake Order Form<span>Enter Cake Details</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process1.php" method="post" >
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="CakeOrder"/>
	<div class="row">
	<div class="col-xs-6">
	<div class="section"><span>1</span>Date &amp; Time</div>
    <div class="inner-wrap">
        <label>Location<input type="text" name="location" value="<?php echo $_SESSION['loc']; ?>"></input></label>
		<label>User<input type="text"  name="user" value="<?php echo $_SESSION['username']; ?>"/></label>
		<label>Order Date<input id="datePicker"type="date" name="orderDate"/></label>
		<label>Decorate Date<input id="decdate" type="text" name="decorateDate" /></label>
		<label>Pick-Up Date<input id="pickdate" type="text" name="pickDate" /></label>
    </div>
	</div>
	<div class="col-xs-6">
	<div class="section"><span>2</span>Customer</div>
    <div class="inner-wrap">
		<label tooltip="Enter the Name" >Customer Name<input type="text" name="cname" /></label>
		<label tooltip="Enter the Phone" >Customer Phone<input type="text" name="cphone" /></label>
		<label tooltip="Enter the Email" >Customer Email<input type="email" name="email" /></label>
		</div>
	</div>
	</div>
	<div class="section"><span>2</span>Cake 1</div>
    <div class="inner-wrap">
		<label>Size1<select name="size1"><option value="mini">Mini</option><option value="8">8"</option><option value="10">10"</option><option value="12">12"</option><option value="custom">Custom</option></select></label>
        <label>Flavour<select name="flavour1_1">
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label>Flavour2<select name="flavour2_1"><option name"null"></option>
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label tooltip="Enter the Cake Message" >Cake Message 1<input type="text" name="mess1" /></label>
		<label tooltip="Enter top specifics" >Cake Top Specifics<input type="textarea" name="top1" /></label>
		<label tooltip="Enter side specifics" >Cake Side Specifics<input type="textarea" name="side1" /></label>
	</div>
	<div class="section"><span>3</span>Cake 1</div>	
	 <div class="inner-wrap">
		<label>Size2<select name="size2"><option value="mini">Mini</option><option value="8">8"</option><option value="10">10"</option><option value="12">12"</option><option value="custom">Custom</option></select></label>
		<label>Flavour<select name="flavour1_2">
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label>Flavour2<select name="flavour2_2"><option name"null"></option>
		<?php 
		//populates the dropdown menu with flavours available from the gelato flavour list gelatoflavors
			include_once '../dbcon.php';
			$res = mysqli_query($con,"SELECT flavour FROM cakeflavors");
			while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			echo "<option value=". $row['flavour'] .">" . $row['flavour'] . "</option>";
			}
			?>
			</select></label>
		<label tooltip="Enter Cake Message" >Cake Message 2<input type="text" name="mess2" /></label>
		<label tooltip="Enter top specifics" >Cake Top Specifics<input type="textarea" name="top2" /></label>
		<label tooltip="Enter side specifics" >Cake Side Specifics<input type="textarea" name="side2" /></label>
	</div>	
    <div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>

</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script   src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>
<script type="text/javascript">
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
$(document).ready(function () {

    $("#pickdate").datepicker({
        dateFormat: "dd-M-yy",
        minDate: 0,
        onSelect: function (date) {
            var date2 = $('#pickdate').datepicker('getDate');
            date2.setDate(date2.getDate() -1);
            $('#decdate').datepicker('setDate', date2);
            //sets maxDate to dt1 date - 1
            $('#decdate').datepicker('option', 'maxDate', date2);
        }
    });
    $('#decdate').datepicker({
        dateFormat: "dd-M-yy",
        onClose: function () {
            var dt1 = $('#pickdate').datepicker('getDate');
            var dt2 = $('#decdate').datepicker('getDate');
            //check to prevent a user from entering a date below date of dt1
            if (dt2 >= dt1) {
                var minDate = $('#decdate').datepicker('option', 'maxDate');
                $('#decdate').datepicker('setDate', maxDate);
            }
        }
    });
});
</script
</body>
</html>