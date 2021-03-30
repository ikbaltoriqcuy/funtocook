<?php 
$id = $_GET['id'];
include("conn.php");
$stid = oci_parse($conn, "SELECT * FROM artikelbahan_alat WHERE ID_ARTIKEL ='$id'");
echo $id;
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);				
?>
     
    <br /> <br/>
		
	<form  method="post">
		 <h1> Isi Artikel Resep </h1>
           <br>
		<div class="title">
			<input id="Text1" name="judul" value='<?php echo $row['JUDUL']; ?>' type="text" placeholder="Title is Here......." />        
		</div>
		<br /><br />
		<div class="n" >
			<div class="materi">
				<div class="content-materi">
				
					<p align="center">
						<textarea id="TextArea1" name="data" rows="2" cols="20"  ><?php echo $row['ISI_ARTIKEL']; ?></textarea>
					</p>
				   <br /><br /><br />
					<hr />
				 
				</div>
			</div>
		</div>
	</form>
<?php 

if(isset($_POST['submit'])){
	     
		   $data = $_POST['data'];
		   $judul = $_POST['judul'];   
		    $stmt = oci_parse($conn, "UPDATE artikelresep ".
                             "SET    JUDUL = '$judul',".
							 "       ISI_ARTIKEL = '$data'".
                             "WHERE  ID_ARTIKEL = '$id'");

		// Bind the values into the parsed statement.
		
		// Execute the completed statement.
			oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
			oci_free_statement($stmt);
				
}
           		
?>
