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
<script src="../gelato/js-script.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.16/d3.min.js"></script>

</head>
    <body>
      <?php include('../menu.php'); ?>
</head>
<?php
 include_once '../dbcon.php';
?>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.16/d3.min.js"></script>
  <script src="script.js"></script>
<div class="form-style-10 col-7">
<h1>Gelato Inventory<span>Creates Paremeters for Production and Revenue</span></h1>
<form method="post" name="frm">
<div class="table-responsive">
<table class="table">
<tr>

</tr>
<tr>
<th align="center">Week Number</th>
<th align="center">Flavour</th>
<th align="center">Total Weight</th>
<th align="center">Average Production</th>
<th align="center">Value</th>
<th align="center">Sold Value</th>
<th align="center">Wasted Value</th>
</tr>
<?php
		$sql = "SELECT WEEK(Date) AS week_name, gelatoproduction.flavour,";
		$sql .=" Round((SUM(insert1) + SUM(insert2) + SUM(insert3) + SUM(insert4) + SUM(insert5) + SUM(insert6))/1000, 2) as Total,";
		$sql .= " Round((SUM(insert1) + SUM(insert2) + SUM(insert3) + SUM(insert4) + SUM(insert5) + SUM(insert6))/6,2) as Average,";
		$sql .= " round((SUM(insert1) + SUM(insert2) + SUM(insert3) + SUM(insert4) + SUM(insert5) + SUM(insert6))*costpergm, 2) as Worth,";
		$sql .= " round((SUM(CASE WHEN status1='1' then insert1 ELSE 0 end) + SUM(CASE WHEN status2='1' then insert2 ELSE 0 end) + SUM(CASE WHEN status3='1' then insert3 ELSE 0 end) + SUM(CASE WHEN status4='1' then insert4 ELSE 0 end) + SUM(CASE WHEN status5='1' then insert5 ELSE 0 end) + SUM(CASE WHEN status6='1' then insert6 ELSE 0 end))*costpergm, 2) as Sold,";
		$sql .= " round((SUM(CASE WHEN status1='2' then insert1 ELSE 0 end) + SUM(CASE WHEN status2='2' then insert2 ELSE 0 end) + SUM(CASE WHEN status3='2' then insert3 ELSE 0 end) + SUM(CASE WHEN status4='2' then insert4 ELSE 0 end) + SUM(CASE WHEN status5='2' then insert5 ELSE 0 end) + SUM(CASE WHEN status6='2' then insert6 ELSE 0 end))*costpergm, 2) as Wasted";
		$sql .= " From gelatoproduction INNER JOIN gelatoflavors";
		$sql .= " ON gelatoproduction.flavour=gelatoflavors.flavour";
		$sql .= " GROUP BY week_name, flavour";
		$sql .= " ORDER BY WEEK(date) ASC";
 $res = $con->query($sql);
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <tr >
   <td align="center"><?php echo $row['week_name']; ?></td>
   <td align="center"><?php echo $row['flavour']; ?></td>
   <td align="center"><?php echo $row['Total']."kg"; ?></td>
   <td align="center"><?php echo $row['Average']."gm"; ?></td>
   <td align="center"><?php echo "$".$row['Worth']; ?></td>
   <td align="center"><?php echo "$".$row['Sold']; ?></td>
   <td align="center"><?php echo "$".$row['Wasted']; ?></td>
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

</div> 
    <?php
}

?>

</table>
</div>
</form>
</div>
<div class="container col-md-4">
    <h2>D3 Graphic</h2>
    <div id="chart"></div>
  </div>
</body>
</html>