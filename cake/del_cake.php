<?php
 
 error_reporting(0);
 
 include_once '../dbcon.php';
 
 $chk = $_POST['chk'];
 $chkcount = count($chk);
 
 if(!isset($chk))
 {
  ?>
        <script>
  alert('At least one checkbox Must be Selected !!!');
  window.location.href = 'cake.php';
  </script>
        <?php
 }
 else
 {
  for($i=0; $i<$chkcount; $i++)
  {
   $del = $chk[$i];
   $sql=$con->query("DELETE FROM cakeflavors WHERE id=".$del);
  } 
  
  if($sql)
  {
   ?>
   <script>
   alert('<?php echo $chkcount; ?> Records Was Deleted !!!');
   window.location.href='cake.php';
   </script>
   <?php
  }
  else
  {
   ?>
   <script>
   alert('Error while Deleting , TRY AGAIN');
   window.location.href='cake.php';
   </script>
   <?php
  }
  
 }
?>