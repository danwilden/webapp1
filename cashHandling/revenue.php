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
<div class="form-style-10 col-11">
<h1>Daily Revenue<span>Input POS Data</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" name="DailyRevenue" id="DailyRevenue">
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="DailyRevenue"/>
    <div class="row">
		<div class="col-xs-3">
			<div class="section"><span>1</span>Date &amp; Time</div>
			<div class="inner-wrap">
				<label>Date<input type="date" name="Date" id="datePicker" /></label>
				<label>Time <input type="time"  value="12:00" step="3600" name="user_time" /></label>
				<label>Location<select name="Location"><option value="Denman">Denman</option><option value="Robson">Robson</option></select></label>
				<label>Shift<select name="Shift"><option value="AM">AM</option><option value="PM">PM</option></select></label>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="section"><span>2</span>Credit/Debit Cards</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount from POS" >American Express<input type="number" name="amex" /></label>
				<label tooltip="Enter the amount from POS" >Master Card<input type="number" name="mc" /></label>
				<label tooltip="Enter the amount from POS" >Visa<input type="number" name="visa" /></label>
				<label tooltip="Enter the amount from POS" >Debit<input type="number" name="deb" /></label>
				<label tooltip="Enter the amount from POS" >Gift Card<input type="number" name="gift" /></label>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="section"><span>3</span>Tax, Returns &amp; Voids</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount from POS" >Tax Collected<input type="number" name="tax" /></label>
				<label tooltip="Enter the amount from POS" >Number of Returns<input type="number" name="retc" /></label>
				<label tooltip="Enter the amount from POS" >Value of Returns<input type="number" name="retv" /></label>
				<label tooltip="Enter the amount from POS" >Number of Voids<input type="number" name="voidc" /></label>
				<label tooltip="Enter the amount from POS" >Value of Voids<input type="number" name="voidv" /></label>
			</div>
		</div>
			<div class="col-xs-3">
			<div class="section"><span>4</span>Cash &amp; Tips</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount from POS" >Cash Owed<input type="number" name="cash" onchange="total3();"/></label>
				<label tooltip="Enter the amount from POS" >Tips Due<input type="number" name="Tips" /></label>
			</div>
		</div>
			<div class="col-xs-3">
			<div class="section"><span>5</span>Total Revenue</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount from POS" ><input type="number" name="tr" /></label>
			</div>
			</div>

	</div>
	<br>
	<h1>Daily Revenue<span>Input Till Balances</span></h1>
	<div class="row">
	<div class="col-xs-3">
			<div class="section"><span>1</span>Canadian Currency</div>
			<div class="inner-wrap" id="Canad">
			<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="c100" ></td>
				<td><input type="text" name="c100Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="c50" /></label></td>
				<td><input type="text" name="c50Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="c20"/></label></td>
				<td><input type="text" name="c20Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="c10" /></label></td>
				<td><input type="text" name="c10Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="c5" /></label></td>
				<td><input type="text" name="c5Value"></input></label></td>
				<label>Total:<input type="number" name="CDNValue" /></label>
			</table>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="section"><span>2</span>US Currency</div>
			<div class="inner-wrap">
				<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="u100" ></td>
				<td><input type="text" name="u100Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="u50" /></label></td>
				<td><input type="text" name="u50Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="u20"/></label></td>
				<td><input type="text" name="u20Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="u10" /></label></td>
				<td><input type="text" name="u10Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="u5" /></label></td>
				<td><input type="text" name="u5Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1's<input type="number" name="u1" /></label></td>
				<td><input type="text" name="u1Value"></input></label></td>
				<label>Total:<input type="number" name="USValue" /></label>
			</table>
			</div>
		</div>
				<div class="col-xs-3">
			<div class="section"><span>3</span>Coins</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount in till" >Coin Total Value<input type="number" name="coins" /></label>

			</div>
		</div>
		<div class="col-xs-3">
			<div class="section"><span>4</span>Balances</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount in till" >Cash Total<input type="number" name="totalcash" /></label>
				<label tooltip="Enter the amount in till" >Cash Status<input type="text" name="CashStatus" /></label>
				<label tooltip="Enter the amount in till" >Revenue<input type="number" name="totalcalcrev" /></label>
				<label tooltip="Enter the amount in till" >Revenue Status<input type="text" name="balance" /></label>
			</div>
			<div class="button-section">
     <input type="submit"  value="Submit"/>
    </div>
	</div>
		</div>
		</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">

$("[name=c100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=c100Value]").val(calc);
	total();
	total2();
	total3();
	
});
$("[name=c50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=c50Value]").val(calc);
	total();
	total2();
	total3();
});
$("[name=c20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=c20Value]").val(calc);
	total();
	total2();
	total3();
});
$("[name=c10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=c10Value]").val(calc);
	total();
	total2();
	total3();
});
$("[name=c5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=c5Value]").val(calc);
	total();
	total2();
	total3();
});
function total(){
var one= $("[name=c5Value]").val();
var two= $("[name=c10Value]").val();
var three= $("[name=c20Value]").val();
var four= $("[name=c50Value]").val();
var five= $("[name=c100Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
	$("[name=CDNValue]").val(calc);
}
$("[name=u100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=u100Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=u50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=u50Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=u20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=u20Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=u10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=u10Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=u5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=u5Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=u1]").change(function(){
    var calc = $(this).val();
    $("[name=u1Value]").val(calc);
	total1();
	total2();
	total3();
});
$("[name=coins]").change(function(){
	total1();
	total2();
	total3();
});
$("[name=amex]").change(function(){
	total4();
});
$("[name=mc]").change(function(){
	total4();
});
$("[name=visa]").change(function(){
	total4();
});
$("[name=debit]").change(function(){
	total4();
});
$("[name=gift]").change(function(){
	total4();
});
$("[name=cash]").change(function(){
	total2();
	total3();
	total4();
});
$("[name=tr]").change(function(){
	total2();
	total3();
	total4();
	total5();
});
function total(){
var one= $("[name=c5Value]").val();
var two= $("[name=c10Value]").val();
var three= $("[name=c20Value]").val();
var four= $("[name=c50Value]").val();
var five= $("[name=c100Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
	$("[name=CDNValue]").val(calc);
}
function total1(){
var one= $("[name=u5Value]").val();
var two= $("[name=u10Value]").val();
var three= $("[name=u20Value]").val();
var four= $("[name=u50Value]").val();
var five= $("[name=u100Value]").val();
var six= $("[name=u1Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five) + Number(six);
	$("[name=USValue]").val(calc);
}
function total2(){
var one= $("[name=USValue]").val();
var two= $("[name=CDNValue]").val();
var three= $("[name=coins]").val();
var calc= Number(one) + Number(two) + Number(three);
	$("[name=totalcash]").val(calc);
}
function total3(){
	var one= $("[name=totalcash]").val();
	var two= $("[name=cash]").val();
    var calc = Number(one)-Number(two);
	var stat= "Balanced";
	if (calc>0){
		stat="Till Over"+calc;
	}else if (calc<0){
		stat="Till Under"+calc;
	}
    $("[name=CashStatus]").val(stat);
	total4();
	}
function total4(){
var one= $("[name=totalcash]").val();
var two= $("[name=amex]").val();
var three= $("[name=mc]").val();
var four= $("[name=visa]").val();
var five= $("[name=deb]").val();
var six= $("[name=gift]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five) + Number(six);
	$("[name=totalcalcrev]").val(calc);
	total5();
}
function total5(){
	var one= $("[name=totalcalcrev]").val();
	var two= $("[name=tr]").val();
    var calc = Number(one)-Number(two);
	var stat= "Balanced";
	if (calc>0){
		stat="Over by"+calc;
	}else if (calc<0){
		stat="Under"+calc;
	}
    $("[name=balance]").val(stat);
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