<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TypeScript HTML App</title>
    <link rel="stylesheet" href="css/createMateri.css" type="text/css" />
    <script src="makeSimulasi.js"></script>
</head>
<body>
 <style> 
   .langkah {
	  padding : 10px 10px 10px 10px ;
	  border : 2px solid #489bac;
   }
 </style>
    <header>
      <?php include('header.php'); ?>
    </header>
	<div class="form">
		<h1>Membuat Simulasi  </h1>
		 <hr/>
		<br><br>
		<div class='langkah'>
			<form action="" method="post" name="makemateri" enctype="multipart/form-data">
			<label>Masukkan Judul:</label>
			  <input type='text' name='judul' />
			  <br/>
			  <label>Upload Gambar :</label>
			  <input type='file' name='data_upload' />

			<input style='float:right;' type='submit' name='tambah' value='Tambah Gambar'/>			 
			<hr>			
			</form>
	</div>
	<br/>
			
		
	</div>
<?php 
  include ('conn.php');
		if(isset($_REQUEST['tambah'])){
		   $folder		= 'image/alat/';
	$file_type	= array('jpg','jpeg','png','PNG','gif','bmp');
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		echo "- Type file yang anda upload tidak sesuai<br />";
	}
	$dir = $folder.$file_name;
	if(move_uploaded_file($_FILES['data_upload']['tmp_name'],$dir )){ 
	       $judul = $_REQUEST['judul'];
		   $id = "bahan_".$judul;
			$stid = oci_parse($conn, "select count(judul) as jml from alat where judul='$judul'");
			oci_execute($stid);
		     $row = oci_fetch_array($stid, OCI_ASSOC);
			if ($row['JML']==0) {				
		   //tambah data colum
		   $sql = 'insert into alat(id_alat,gambar,judul)  values(:id,:gambar,:judul)';	
		   
			$send = oci_parse($conn, $sql);
			oci_bind_by_name($send, ':id', $id);
			oci_bind_by_name($send, ':gambar', $dir);
			oci_bind_by_name($send, ':judul', $judul);
            oci_execute($send);
			oci_free_statement($send);
            oci_close($conn);
			echo "<script> alert('data telah masuk');</script>";
			}else{
				echo "<script> alert('data judul dengan nama $judul telah ada.Coba Lagi!!!');</script>";
			}
			
         }
	}		 
		?>
</body>
</html>