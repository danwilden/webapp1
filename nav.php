<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Temperature Logs</title>
  <meta name="author" content="Dan Wilden">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
</head>
<body>

<?php include('menu2.php'); ?>
<div class="form-style-10 col-xs-12 col-sm-6 col-md-8">
<h1>Navigation<span>Click an Icon.</span></h1>
<!-- This is the post method php system that utilized process, config and function.php files-->
	<!--The value in this input is what drives the table. The Names of each input become the Field names.-->
		<!-- Brings common identifiers selections in-->
			<div class="section" style="text-align:center;">Production</div>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td class="button"><input type="button" onClick="window.location.href='gelato/gelprod.php'" alt="edit" value="Produce Gelato" /></td>
						<td class="button"><input type="button" onClick="window.location.href='cake/cakeprod.php'" alt="edit" value="Produce Cakes" /></td>
						<td><input type="button" onClick="window.location.href='dessert/desprod.php'" alt="edit" value="Produce Desserts" /></td>
					</tr>
				</table>

			<div class="section" style="text-align:center;">Revenue</div>
			<div class="table-responsive">
			<table class="table">
				<tr>
					<td class="button"><input type="button" onClick="window.location.href='cashHandling/revenue.php'" alt="edit" value="Daily Revenue" /></td>
					<td class="button"><input type="button" onClick="window.location.href='cashHandling/safetill.php'" alt="edit" value="Shift Count" /></td>
				</tr>
			</table>
			</div>

		<div class="row">
			<div class="section" style="text-align:center;">Audits</div>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td class="button"><input type="button" onClick="window.location.href='audits/dbc.php'" alt="edit" value="Daily Bathroom Check" /></td>
						<td class="button"><input type="button" onClick="window.location.href='audits/temperature.php'" alt="edit" value="Daily Temperature Check" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="section" style="text-align:center;">Management</div>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td class="button"><input type="button" onClick="window.location.href='cake/cake.php'" alt="edit" value="Cake Admin" /></td>
						<td class="button"><input type="button" onClick="window.location.href='gelato/index.php'" alt="edit" value="Gelto Admin" /></td>
						<td><input type="button" onClick="window.location.href='dessert/dessert.php'" alt="edit" value="Dessert Admin" /></td>
					</tr>
				</table>
			</div>
		</div>
	</form>
</div>
</body>
</html>