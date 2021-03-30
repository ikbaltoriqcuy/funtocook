<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TypeScript HTML App</title>
    <link rel="stylesheet" href="css/createMateri.css" type="text/css" />
    <script src="app.js"></script>
</head>
<body>

    <header>
        <?php 
		   include('header.php');
		?>
    </header>
<?php 
include("conn.php");
?>
           <br>
		 <div class="form">
	<form action="" method="post" name="makemateri" enctype="multipart/form-data">
	     <br /> <br/>
	 <h1> Isi Artikel Alat dan Bahan </h1>
    	 
    	 
		<div class="title">
			<input id="Text1" name="judul" type="text" placeholder="Title is Here......." required />        
		</div>
		<br /><br />
		<div class="n" >
			<div class="materi">
				<div class="content-materi">
				
					<div align="center">
						<img src="photho.png" height="30%" width="40%" /> <br/><br />
						<input id="File1" type="file" name="data_upload" required/>
					</div>
					<p align="center">
						<textarea id="TextArea1" name="data" rows="2" cols="20" value="" placeholder="Your Materi is Here...." required></textarea>
					</p>
				   <br /><br /><br />
					<hr />
					 <div class="play" align="right">
						<input id="button" type="submit" value="Create" name='submit' />
					</div>				 
				</div>
			</div>
		</div>
	</form>
		</div>
		<?php 
		if(isset($_REQUEST['submit'])){
	
			$query = oci_parse($conn , "select getRowsA as jumlah from dual");
			oci_execute($query);
			while(oci_fetch_array($query))   {   
				$id = oci_result($query,"JUMLAH") +1 ;   
			}
	        $id = "RES_".$id;
		   $folder		= 'image/';
	$file_type	= array('jpg','jpeg','png','PNG','gif','bmp','doc','docx','xls','xlsx','sql');
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
		   $data = $_REQUEST['data'];
		   $judul = $_REQUEST['judul'];
		   
		   $json = file_get_contents('./jumlah.json');
		   $json_data = json_decode($json,true);
		   $id_artikel ='RES_'.$json_data["jumlahsoal-resep"];
		   $jumlah=$json_data["jumlahsoal-resep"];
		   
		   $sql = 'insert into ARTIKELBAHAN_ALAT(id_artikel,judul,gambar,isi_artikel)  values(:id,:judul,:data_upload,:data)';			 
			$send = oci_parse($conn, $sql);
			oci_bind_by_name($send, ':id', $id);
			oci_bind_by_name($send, ':judul', $judul);
			oci_bind_by_name($send, ':data_upload', $dir);
			oci_bind_by_name($send, ':data', $data);
            oci_execute($send);
			oci_free_statement($send);
            oci_close($conn);
			}
			$jumlah +=1;
			$contents = file_get_contents('jumlah.json');
			$contentsDecoded = json_decode($contents, true);
			$contentsDecoded['jumlahsoal-resep']=$jumlah;
			$json = json_encode($contentsDecoded);
			file_put_contents('jumlah.json', $json);
			
         }         		
		?>
	<div id="content">
	</div>
</body>
</html>