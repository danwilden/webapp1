<?php
//updates the gelato inventory page statues of sold wasted or on display
include_once '../dbcon.php';
$id = $_POST['id'];
$s1 = $_POST['s1'];

$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE cakeproduction SET status='$s1[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: cakecomp.php");
?>