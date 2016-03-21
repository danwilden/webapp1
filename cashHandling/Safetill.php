<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Safe and Till Recon</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../main.css" type="text/css" media="screen" />

</head>
    <body>
      <?php include('../menu.php'); ?>
<div class="form-style-10 col-10">
<h1>Shift Count<span>Input Cash Levels for the Safe and Till</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
<form action="../process.php" method="post" name="DailyRevenue" id="DailyRevenue">
<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
    <!-- Brings common identifiers selections in-->
 <input type="hidden" name="formID" value="DailyRevenue"/>
    <div class="row">
		<div class="col-md-4">
			<div class="section"><span>1</span>Date &amp; Time</div>
			<div class="inner-wrap">
				<label>Date<input type="date" name="Date" id="datePicker" /></label>
				<label>Time <input type="time"  value="12:00" step="3600" name="user_time" /></label>
				<label>Location<select name="Location"><option value="Denman">Denman</option><option value="Robson">Robson</option></select></label>
				<label>Shift<select name="Shift"><option value="AM">AM</option><option value="PM">PM</option></select></label>
				<label>Open/Close<select name="open_close"><option value="open">Open</option><option value="close">Close</option></select></label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="section"><span>2</span>Till Balances</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount in till" >Cash Total<input type="number" name="ttotalcash" /></label>
				<label tooltip="Enter the amount in till" >Coin Rolls Total<input type="text" name="ttotalrolls" /></label>
				<label tooltip="Enter the amount in till" >Loose Coins<input type="number" name="tloosecoins" /></label>
				<label tooltip="Enter the amount in till" >Total Currency<input type="text" name="tbalance" /></label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="section"><span>3</span>Safe Balances</div>
			<div class="inner-wrap">
				<label tooltip="Enter the amount in till" >Cash Total<input type="number" name="stotalcash" /></label>
				<label tooltip="Enter the amount in till" >Coin Rolls Total<input type="text" name="stotalrolls" /></label>
				<label tooltip="Enter the amount in till" >Total Currency<input type="text" name="sbalance" /></label>
			</div>
		</div>

		</div>
		
	<br>	
	<h1>Till<span>Input Till Balances</span></h1>
	<div class="row">
	<div class="col-md-4">
			<div class="section"><span>1</span>Canadian Currency</div>
			<div class="inner-wrap" id="Canad">
			<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="tc100" ></td>
				<td><input type="text" name="tc100Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="tc50" /></label></td>
				<td><input type="text" name="tc50Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="tc20"/></label></td>
				<td><input type="text" name="tc20Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="tc10" /></label></td>
				<td><input type="text" name="tc10Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="tc5" /></label></td>
				<td><input type="text" name="tc5Value"></input></label></td>
				<label>Total:<input type="number" name="tCDNValue" /></label>
			</table>
			</div>
		</div>
	<div class="col-md-4">
			<div class="section"><span>1</span>Canadian Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
			<tr><td><label tooltip="Enter the amount in till" >Number of $2 Coin Rolls<input type="number" name="tc2" ></td>
				<td><input type="text" name="tc2Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1 Coin Rolls<input type="number" name="tc1" /></label></td>
				<td><input type="text" name="tc1Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coin Rolls<input type="number" name="tc25"/></label></td>
				<td><input type="text" name="tc25Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coin Rolls<input type="number" name="tc010" /></label></td>
				<td><input type="text" name="tc010Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coin Rolls<input type="number" name="tc05" /></label></td>
				<td><input type="text" name="tc05Value"></input></label></td>
				<label>Total:<input type="number" name="tCDNCOINValue" /></label>
			</table>
			</div>
	</div>
		<div class="col-md-4">
			<div class="section"><span>1</span>Canadian Loose Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
			<tr><td><label tooltip="Enter the amount in till" >Number of $2 Coins<input type="number" name="tcl2" ></td>
				<td><input type="text" name="tcl2Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1 Coins<input type="number" name="tcl1" /></label></td>
				<td><input type="text" name="tcl1Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coins<input type="number" name="tcl25"/></label></td>
				<td><input type="text" name="tcl25Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coins<input type="number" name="tcl010" /></label></td>
				<td><input type="text" name="tcl010Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coins<input type="number" name="tcl05" /></label></td>
				<td><input type="text" name="tcl05Value"></input></label></td>
				<label>Total:<input type="number" name="tCDNLCOINValue" /></label>
			</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="section"><span>2</span>US Currency</div>
			<div class="inner-wrap">
				<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="tu100" ></td>
				<td><input type="text" name="tu100Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="tu50" /></label></td>
				<td><input type="text" name="tu50Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="tu20"/></label></td>
				<td><input type="text" name="tu20Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="tu10" /></label></td>
				<td><input type="text" name="tu10Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="tu5" /></label></td>
				<td><input type="text" name="tu5Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1's<input type="number" name="tu1" /></label></td>
				<td><input type="text" name="tu1Value"></input></label></td>
				<label>Total:<input type="number" name="tUSValue" /></label>
			</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="section"><span>1</span>US Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coin Rolls<input type="number" name="tu25"/></label></td>
				<td><input type="text" name="tu25Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coins Rolls<input type="number" name="tu010" /></label></td>
				<td><input type="text" name="tu010Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coins Rolls<input type="number" name="tu05" /></label></td>
				<td><input type="text" name="tu05Value"></input></label></td>
				<label>Total:<input type="number" name="tUSCOINValue" /></label>
			</table>
			</div>
			</div>
		<div class="col-md-4">
			<div class="section"><span>1</span>US Loose Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coins<input type="number" name="tul25"/></label></td>
				<td><input type="text" name="tul25Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coins<input type="number" name="tul010" /></label></td>
				<td><input type="text" name="tul010Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coins<input type="number" name="tul05" /></label></td>
				<td><input type="text" name="tul05Value"></input></label></td>
				<label>Total:<input type="number" name="tUSLCOINValue" /></label>
			</table>
			</div>
		</div>
	</div>
	<br>
<h1>Safe<span>Input Safe Balances</span></h1>	
	<div class="row">
	<div class="col-xs-6">
			<div class="section"><span>1</span>Canadian Currency</div>
			<div class="inner-wrap" id="Canad">
			<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="sc100" ></td>
				<td><input type="text" name="sc100Value" ></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="sc50" /></label></td>
				<td><input type="text" name="sc50Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="sc20"/></label></td>
				<td><input type="text" name="sc20Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="sc10" /></label></td>
				<td><input type="text" name="sc10Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="sc5" /></label></td>
				<td><input type="text" name="sc5Value"></input></label></td></tr>
				<label>Total:<input type="number" name="sCDNValue" /></label>
			</table>
			</div>
		</div>
	<div class="col-xs-6">
			<div class="section"><span>1</span>Canadian Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
			<tr><td><label tooltip="Enter the amount in till" >Number of $2 Coin Rolls<input type="number" name="sc2" ></td>
				<td><input type="text" name="sc2Value" ></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1 Coin Rolls<input type="number" name="sc1" /></label></td>
				<td><input type="text" name="sc1Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coin Rolls<input type="number" name="sc25"/></label></td>
				<td><input type="text" name="sc25Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coin Rolls<input type="number" name="sc010" /></label></td>
				<td><input type="text" name="sc010Value"></input></label></td></tr>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coin Rolls<input type="number" name="sc05" /></label></td>
				<td><input type="text" name="sc05Value"></input></label></td></tr>
				<label>Total:<input type="number" name="sCDNCOINValue" /></label>
			</table>
			</div>
	</div>
		<div class="col-xs-6">
			<div class="section"><span>2</span>US Currency</div>
			<div class="inner-wrap">
				<table>
				<tr><td><label tooltip="Enter the amount in till" >Number of $100's<input type="number" name="su100" ></td>
				<td><input type="text" name="su100Value" ></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $50's<input type="number" name="su50" /></label></td>
				<td><input type="text" name="su50Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $20's<input type="number" name="su20"/></label></td>
				<td><input type="text" name="su20Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $10's<input type="number" name="su10" /></label></td>
				<td><input type="text" name="su10Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $5's<input type="number" name="su5" /></label></td>
				<td><input type="text" name="su5Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $1's<input type="number" name="su1" /></label></td>
				<td><input type="text" name="su1Value"></input></label></td>
				<label>Total:<input type="number" name="sUSValue" /></label>
			</table>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="section"><span>1</span>US Coins</div>
			<div class="inner-wrap" id="Canad">
			<table>	
				<tr><td><label tooltip="Enter the amount in till" >Number of $.25 Coin Rolls<input type="number" name="su25"/></label></td>
				<td><input type="text" name="su25Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.10 Coins Rolls<input type="number" name="su010" /></label></td>
				<td><input type="text" name="su010Value"></input></label></td>
				<tr><td><label tooltip="Enter the amount in till" >Number of $.5 Coins Rolls<input type="number" name="su05" /></label></td>
				<td><input type="text" name="su05Value"></input></label></td>
				<label>Total:<input type="number" name="sUSCOINValue" /></label>
			</table>
			</div>
						<div class="button-section">
				<input type="submit"  value="Submit"/>
			</div>
		</div>
	</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="jsfunction.js" type="text/javascript"></script>
<script type="text/javascript">
function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}
$("[name=tc100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=tc100Value]").val(calc);
	total();
	total2();
	total5();	
});
$("[name=sc100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=sc100Value]").val(calc);
	total();
	total2();
	total4();	
});
$("[name=tc50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=tc50Value]").val(calc);
	total();
	total2();
	total5();
});
$("[name=sc50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=sc50Value]").val(calc);
	total();
	total2();
	total4();
});
$("[name=tc20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=tc20Value]").val(calc);
	total();
	total2();
	total5();
});
$("[name=sc20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=sc20Value]").val(calc);
	total();
	total2();
	total4();
});
$("[name=tc10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=tc10Value]").val(calc);
	total();
	total2();
	total5();
});
$("[name=sc10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=sc10Value]").val(calc);
	total();
	total2();
	total4();
});
$("[name=tc5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=tc5Value]").val(calc);
	total();
	total2();
	total5();
});
$("[name=sc5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=sc5Value]").val(calc);
	total();
	total2();
	total4();
});

$("[name=tu100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=tu100Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su100]").change(function(){
    var calc = $(this).val()*100;
    $("[name=su100Value]").val(calc);
	total1();
	total3();
	total4();
});
$("[name=tu50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=tu50Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su50]").change(function(){
    var calc = $(this).val()*50;
    $("[name=su50Value]").val(calc);
	total1();
	total3();
	total4();
});
$("[name=tu20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=tu20Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su20]").change(function(){
    var calc = $(this).val()*20;
    $("[name=su20Value]").val(calc);
	total1();
	total3();
	total4();
});
$("[name=tu10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=tu10Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su10]").change(function(){
    var calc = $(this).val()*10;
    $("[name=su10Value]").val(calc);
	total1();
	total3();
	total4();
});
$("[name=tu5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=tu5Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su5]").change(function(){
    var calc = $(this).val()*5;
    $("[name=su5Value]").val(calc);
	total1();
	total3();
	total4();
});
$("[name=tu1]").change(function(){
    var calc = $(this).val();
    $("[name=tu1Value]").val(calc);
	total1();
	total3();
	total5();
});
$("[name=su1]").change(function(){
    var calc = $(this).val();
    $("[name=su1Value]").val(calc);
	total1();
	total3();
	total4();
});

$("[name=tc2]").change(function(){
    var calc = $(this).val()*2*50;
    $("[name=tc2Value]").val(calc);
	total6();
	
});
$("[name=tcl2]").change(function(){
    var calc = $(this).val()*2;
    $("[name=tcl2Value]").val(calc);
	total8();
	
});
$("[name=sc2]").change(function(){
    var calc = $(this).val()*2*50;
    $("[name=sc2Value]").val(calc);
	total7();		
});
$("[name=tc1]").change(function(){
    var calc = $(this).val()*50;
    $("[name=tc1Value]").val(calc);
	total6();		
});
$("[name=tcl1]").change(function(){
    var calc = $(this).val();
    $("[name=tcl1Value]").val(calc);
	total8();
	
});
$("[name=sc1]").change(function(){
    var calc = $(this).val()*50;
    $("[name=sc1Value]").val(calc);
	total7();
		
});
$("[name=tc25]").change(function(){
    var calc = $(this).val()*0.25*50;
	var calc =round(calc,2);
    $("[name=tc25Value]").val(calc);
	total6();	
});
$("[name=tcl25]").change(function(){
    var calc = $(this).val()*0.25;
	var calc =round(calc,2);
    $("[name=tcl25Value]").val(calc);
	total8();	
});
$("[name=sc25]").change(function(){
    var calc = $(this).val()*0.25*50;
	var calc =round(calc,2);
    $("[name=sc25Value]").val(calc);
	total7();
});
$("[name=tc010]").change(function(){
    var calc = $(this).val()*50/10;
	var calc =round(calc,2);
    $("[name=tc010Value]").val(calc);
	total6();	
});
$("[name=tcl010]").change(function(){
    var calc = $(this).val()/10;
	var calc =round(calc,2);
    $("[name=tcl010Value]").val(calc);
	total8();
});
$("[name=sc010]").change(function(){
    var calc = $(this).val()*50/10;
	var calc =round(calc,2);
    $("[name=sc010Value]").val(calc);
	total7();
});
$("[name=tc05]").change(function(){
    var calc = $(this).val()*0.05*50;
	var calc =round(calc,2);
    $("[name=tc05Value]").val(calc);
	total6();	
});
$("[name=tcl05]").change(function(){
    var calc = $(this).val()*0.05;
	var calc =round(calc,2);
    $("[name=tcl05Value]").val(calc);
	total7();
});
$("[name=sc05]").change(function(){
    var calc = $(this).val()*2.5;
	var calc =round(calc,2);
    $("[name=sc05Value]").val(calc);
	total8();	
});

$("[name=tu25]").change(function(){
    var calc = $(this).val()*0.25*50;
	var calc =round(calc,2);
    $("[name=tu25Value]").val(calc);
	total9();	
});
$("[name=tul25]").change(function(){
    var calc = $(this).val()*0.25;
	var calc =round(calc,2);
    $("[name=tul25Value]").val(calc);
	total11();	
});
$("[name=su25]").change(function(){
    var calc = $(this).val()*0.25*50;
	var calc =round(calc,2);
    $("[name=su25Value]").val(calc);
	total10();
});
$("[name=tu010]").change(function(){
    var calc = $(this).val()*50/10;
	var calc =round(calc,2);
    $("[name=tu010Value]").val(calc);
	total9();	
});
$("[name=tul010]").change(function(){
    var calc = $(this).val()/10;
	var calc =round(calc,2);
    $("[name=tul010Value]").val(calc);
	total11();
});
$("[name=su010]").change(function(){
    var calc = $(this).val()*50/10;
	var calc =round(calc,2);
    $("[name=su010Value]").val(calc);
	total10();
});
$("[name=tu05]").change(function(){
    var calc = $(this).val()*0.05*50;
	var calc =round(calc,2);
    $("[name=tu05Value]").val(calc);
	total9();	
});
$("[name=tul05]").change(function(){
    var calc = $(this).val()*0.05;
	var calc =round(calc,2);
    $("[name=tul05Value]").val(calc);
	total11();
});
$("[name=su05]").change(function(){
    var calc = $(this).val()*0.05*50;
	var calc =round(calc,2);
    $("[name=su05Value]").val(calc);
	total10();	
});
//calculates the amount of CDN bills in the safe
function total(){
var one= $("[name=sc5Value]").val();
var two= $("[name=sc10Value]").val();
var three= $("[name=sc20Value]").val();
var four= $("[name=sc50Value]").val();
var five= $("[name=sc100Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
	$("[name=sCDNValue]").val(calc);
}
//calculates the amount of CDN bills in the till
function total2(){
var one= $("[name=tc5Value]").val();
var two= $("[name=tc10Value]").val();
var three= $("[name=tc20Value]").val();
var four= $("[name=tc50Value]").val();
var five= $("[name=tc100Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
	$("[name=tCDNValue]").val(calc);
}
//calculates the amount of US bills in the till
function total1(){
var one= $("[name=tu5Value]").val();
var two= $("[name=tu10Value]").val();
var three= $("[name=tu20Value]").val();
var four= $("[name=tu50Value]").val();
var five= $("[name=tu100Value]").val();
var six= $("[name=tu1Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five) + Number(six);
	$("[name=tUSValue]").val(calc);
}
//calculates the amount of US bills in the safe
function total3(){
var one= $("[name=su5Value]").val();
var two= $("[name=su10Value]").val();
var three= $("[name=su20Value]").val();
var four= $("[name=su50Value]").val();
var five= $("[name=su100Value]").val();
var six= $("[name=su1Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five) + Number(six);
	$("[name=sUSValue]").val(calc);
}
//calculates the amount of total bills in the safe
function total4(){
var one= $("[name=sUSValue]").val();
var two= $("[name=sCDNValue]").val();
var calc= Number(one) + Number(two);
	$("[name=stotalcash]").val(calc);
		total16();
}
//calculates the amount of total bills in the till
function total5(){
var one= $("[name=tUSValue]").val();
var two= $("[name=tCDNValue]").val();
var calc= Number(one) + Number(two);
	$("[name=ttotalcash]").val(calc);
		total15();
	}
	//calculates the amount of CDN coins in the safe
function total6(){
var one= $("[name=tc2Value]").val();
var two= $("[name=tc1Value]").val();
var three= $("[name=tc25Value]").val();
var four= $("[name=tc010Value]").val();
var five= $("[name=tc05Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=tCDNCOINValue]").val(calc);
	//Calls a total roll calculation
	total12();
}
//calculates the amount of CDN coins in the safe
function total7(){
var one= $("[name=sc2Value]").val();
var two= $("[name=sc1Value]").val();
var three= $("[name=sc25Value]").val();
var four= $("[name=sc010Value]").val();
var five= $("[name=sc05Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=sCDNCOINValue]").val(calc);
	//calls a total roll calculation
	total13();
}
//calculates loose CDN coins in till
function total8(){
var one= $("[name=tcl2Value]").val();
var two= $("[name=tcl1Value]").val();
var three= $("[name=tcl25Value]").val();
var four= $("[name=tcl010Value]").val();
var five= $("[name=tcl05Value]").val();
var calc= Number(one) + Number(two) + Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=tCDNLCOINValue]").val(calc);
	//calls a total coin count
	total14();
}
//Calculates US coin in till
function total9(){
var three= $("[name=tu25Value]").val();
var four= $("[name=tu010Value]").val();
var five= $("[name=tu05Value]").val();
var calc= Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=tUSCOINValue]").val(calc);
	//calls a toal coin count
	total12();
}
function total10(){
var three= $("[name=su25Value]").val();
var four= $("[name=su010Value]").val();
var five= $("[name=su05Value]").val();
var calc= Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=sUSCOINValue]").val(calc);
	total13();
}
function total11(){
var three= $("[name=tul25Value]").val();
var four= $("[name=tul010Value]").val();
var five= $("[name=tul05Value]").val();
var calc= Number(three) + Number(four) + Number(five);
var calc =round(calc,2);
	$("[name=tUSLCOINValue]").val(calc);
	total14();
}
function total12(){
var one= $("[name=tUSCOINValue]").val();
var two= $("[name=tCDNCOINValue]").val();
var calc= Number(one) + Number(two);
var calc =round(calc,2);
	$("[name=ttotalrolls]").val(calc);
		total15();
	}
function total13(){
var one= $("[name=sUSCOINValue]").val();
var two= $("[name=sCDNCOINValue]").val();
var calc= Number(one) + Number(two);
var calc =round(calc,2);
	$("[name=stotalrolls]").val(calc);
	}
function total14(){
var one= $("[name=tUSLCOINValue]").val();
var two= $("[name=tCDNLCOINValue]").val();
var calc= Number(one) + Number(two);
var calc =round(calc,2);
	$("[name=tloosecoins]").val(calc);
	total15();
	}
function total15(){
var one= $("[name=tloosecoins]").val();
var two= $("[name=ttotalrolls]").val();
var three= $("[name=ttotalcash]").val();
var calc= Number(one) + Number(two)+ Number(three);
var calc =round(calc,2);
	$("[name=tbalance]").val(calc);
	}
	function total16(){
var two= $("[name=stotalrolls]").val();
var three= $("[name=stotalcash]").val();
var calc= Number(two)+ Number(three);
var calc =round(calc,2);
	$("[name=sbalance]").val(calc);
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