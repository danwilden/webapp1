<?php
//individually processes the gelato flavour additions with a single selection. Pushed here from javascript and edit_mul.php
include_once '../dbcon.php';
$id = $_POST['id'];
$fn = $_POST['fn'];
$chkcount = count($id);
//Iterates through the values from the post
for($i=0; $i<$chkcount; $i++)
{
 $sql= "UPDATE cakeflavors SET flavour='$fn[$i]' WHERE ID=" . $id[$i];
 mysqli_query($con,$sql);
 
}
header("Location: cake.php");
?>