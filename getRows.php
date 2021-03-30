<?php 
 include ('koneksi.php');
 
 $query = oci_parse($conn , "select getRows jumlah from dual");
oci_execute($query);
while( oci_fetch_array($query))   
{        
echo "Notifier: " . oci_result($query,"JUMLAH");   
} 
?>