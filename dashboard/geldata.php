<?php
 include_once '../dbcon.php';
?>
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

 $data = array();
    
    for ($x = 0; $x < mysqli_num_rows($res); $x++) {
        $data[] = mysqli_fetch_assoc($res);
    }
    
    echo json_encode($data);     
     
    mysqli_close($con);
?>
