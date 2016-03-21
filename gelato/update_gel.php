<?php
//updates the gelato inventory page statues of sold wasted or on display
include_once '../dbcon.php';
$id = $_POST['id'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$s3 = $_POST['s3'];
$s4 = $_POST['s4'];
$s5 = $_POST['s5'];
$s6 = $_POST['s6'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE gelatoproduction SET status1='$s1[$i]', status2='$s2[$i]',status3='$s3[$i]',status4='$s4[$i]', status5='$s5[$i]',status6='$s6[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: gelcomp.php");
?>