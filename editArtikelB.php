<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TypeScript HTML App</title>
    <link rel="stylesheet" href="css/createMateri.css" type="text/css" />
    <link rel="stylesheet" href="edit.css" type="text/css" />
	 <script src="app.js"></script>
</head>
<body>
<script> 

function editArtikel(id) { 
    document.getElementById("f").innerHTML = '';

 	if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();
        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("f").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","edit.php?id="+id,true);
        xmlhttp.send();
		
   }
 
 
function hapusArtikel(id) { 
       	alert("Apakah Anda ingin menghapus : ");
 	   if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		  xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("art").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","deleteAlat.php?id="+id,true);
        xmlhttp.send();
		 
 }
   
</script>
    <header>
        <?php 
		   include('header.php');
		
		?>
    </header>
<?php 
include("conn.php");
?>
     
    <br /> <br/>
<div class="form" id='f'>
   <div align='center'>
		<h1>All Data Artikel<h1>
   </div>
   <div class="search" align="center">
            <form>
                <input type="text"  name='search' id='name'/>
                <input type="button" value="SEARCH" name='submit' onClick='Pool()' />
            </form>
        </div>

        <br /><br />
        <br /><br />
        <br /><br />
        <div align="center">
            <p style="font-family:Batang; font-size:40px;">Artikel Bahan dan Alat</p>
            <div>
                <div style="height:1px; width:50%;background-color:#000;"></div>
                <br />
                <div style="height:1px; width:30%;background-color:#000;"></div>
            </div>
        </div>
		<?php
			$query = oci_parse($conn , "select getRowsA as jumlah from dual");
			oci_execute($query);
			while(oci_fetch_array($query))   {   
				$id = oci_result($query,"JUMLAH")  ;   
			}
	       echo "<p>Jumlah artikel ada : $id </p>";
		?>
        <br /><br /><br />
        <div align="center">
            <div class="artikel" id='art'> 
			  
			   <?php
			    include('conn.php');
				$stid = oci_parse($conn, 'SELECT * FROM ARTIKELBAHAN_ALAT');
					oci_execute($stid);
					while (($row = oci_fetch_array($stid, OCI_ASSOC))) {
					   $gambar = $row['GAMBAR'];
						echo "<div class='artikel-conten'>
						       <h4>".$row['JUDUL']." </h4>
						      <img src ='$gambar'> </img>";
						?>
						<p>
						<?php 
						  $id = $row['ID_ARTIKEL'];
						  echo  substr($row['ISI_ARTIKEL'],0,12)."...";
						  ?>
						          <form method='post'>
								  <div class='form-group'>
								  
									<input type='submit' name value='Edit' onClick="editArtikel(<?php echo "'".$id."'"; ?>)" class='form-control'/>
                                    <input type='submit'  value='Hapus' onClick="hapusArtikel(<?php echo "'".$id."'"; ?>)"class='form-control'/>									
								  </div>
								 </form> 
								 </div>
						</p>
						<?php
					}
					
			   ?> 
			   
                
    </div>
	</div>   
</div>
		
	<div id="content">
	</div>
</body>
</html>