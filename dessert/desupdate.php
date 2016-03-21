<?php
//updates the gelato inventory page statues of sold wasted or on display
include_once '../dbcon.php';
$id = $_POST['id'];
$s1 = $_POST['np_sold'];
$s2 = $_POST['np_wasted'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE dessertproduction SET np_sold='$s1[$i]', np_wasted='$s2[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: descomp.php");
?>