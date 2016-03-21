<?php
include_once '../dbcon.php';
$id = $_POST['id'];
$fn = $_POST['np_sold'];
$cn = $_POST['np_wasted'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE dessertproduction SET np_sold='$fn[$i]', np_wasted='$cn[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: descomp.php");
?>