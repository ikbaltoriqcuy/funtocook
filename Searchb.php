<?php

$name = trim($_GET['name']);
 include('conn.php');
               if ($name != '') {
					$stid = oci_parse($conn, "SELECT * FROM artikelbahan_alat WHERE JUDUL ='$name'");
			   } else{
				   $stid = oci_parse($conn, "SELECT * FROM artikelbahan_alat ");
			   }
					oci_execute($stid);
					while (($row = oci_fetch_array($stid, OCI_ASSOC))) {
					   $gambar = $row['GAMBAR'];
						echo "<div class='artikel-conten'>
							  <h4>".$row['JUDUL']." </h4>
						      <img src ='$gambar'> </img>";
						?>
						<p>
						<?php 
						  echo  substr($row['ISI_ARTIKEL'],0,12)."...
						          <form method='post'>
								  <input type='submit' name='submit' value='readmore'> 
								 <div style='visibility:hidden;'> 
								 <input type='text' name='id' value='".$row['ID_ARTIKEL']."' >
                                 </div> 							  
								  </form> </div>" ;
						   
						?>
						</p>
						<?php
					}
					oci_free_statement($stid);
					oci_close($conn);
					if (isset($_POST['submit'])) { 
					       $id = $_POST['id'];
					       $contents = file_get_contents('sendmateri.json');
						   $contentsDecoded = json_decode($contents, true);
						   $contentsDecoded['id_resep']=trim($id);
						   $json = json_encode($contentsDecoded);
						   file_put_contents('sendmateri.json', $json);
						   header("location:materi.php");
					}
?>