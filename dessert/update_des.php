<?php
include_once '../dbcon.php';
$id = $_POST['id'];
$fn = $_POST['fn'];
$cn = $_POST['cn'];
$an = $_POST['an'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE desserts SET dessert='$fn[$i]', cpp='$cn[$i]', ppp='$an[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: dessert.php");
?>