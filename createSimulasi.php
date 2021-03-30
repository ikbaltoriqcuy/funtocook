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
		<input style='float:right;' type='submit' name='tambah' onClick='addItem()' value='Tambah Langkah' />
		<br><br>
		<div class='langkah'>
			<form action="" method="post" name="makemateri" enctype="multipart/form-data">
			  
				 <table class='tab'>
				    
					<tr>
					  <td> Langkah-1 </td>
					</tr>
					<tr>
					   <td>
						<label>Masukkan Bahan : </label>
					   </td>
					   <td>
						<input type='file' name='bahan' />
					   </td>
					</tr>
				   
				   <tr>
					   <td>
							<label>Alat yang digunakan : </label>
						</td>
						<td> 
							<input type='file' name='alat' />
						</td>
					</tr>
					
				   <tr>
					   <td> 
						<label>Time :</label>
					   </td>
					   <td>
						<input type='number' name='time'> second</input>
					   </td>
				   </tr>
				</table>
				<div id='lanjut1'>
			     </div>
				  
				  <br/>
			</form>
		<button onClick='lanjut(1)'>Tambah Langkah Lanjutan</button>
	</div>
	<br/>
				  <div id='content'> 
		  
				</div>
		
		<hr>
			<input style='float:right;' type='submit' name='tambah' value='Make simulasi'/>
		
	</div>

</body>
</html>