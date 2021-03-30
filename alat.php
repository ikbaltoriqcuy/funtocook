<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="resep.css" type="text/css" />
</head>
<body>

 <script>
 function Pool() { 
      var id  = document.getElementById('name').value;
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
        xmlhttp.open("GET","Searchb.php?name="+id,true);
        xmlhttp.send();
   }
 
 </script>
    <header>
        <div id="judul" style="float:left;">
            <br />
            <div align="center">
                <img src="logo1.png" width="30%" height="40%" />
            </div>

        </div>
        <div align="center">
            <ul class="header">

                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="resep.php">Resep</a>
                </li>
                <li>
                    <a href="alat.php">Bahan & Alat</a>
                </li>
                <li>
                    <a href="tentangKami.html">Tentang Kami</a>
                </li>

            </ul>
        </div>
    </header>
    <div class="content"  >
        <br /><br />

        <div class="search" align="center">
            <form>
                <input type="text"  name='search' id='name'/>
                <input type="button" value="SEARCH"  onClick='Pool()' />
            </form>
        </div>

        <br /><br />
        <br /><br />
        <br /><br />
        <div align="center">
            <p style="font-family:Batang; font-size:40px;">Alat dan Bahan</p>
            <div>
                <div style="height:1px; width:50%;background-color:#000;"></div>
                <br />
                <div style="height:1px; width:30%;background-color:#000;"></div>
            </div>
        </div>
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
						         <h4>".$row['JUDUL']."</h4>
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
						   header("location:materiAlat.php");
					}
			   ?> 
			   
                
    </div>
	</div>
    <br>	
	<footer > 
	  <div class="bevel"></div>
		<div class="webInfo">
		   
			<img src="logo1.png" />
			<p> Fun to cook adalah solusi itu semua website edukasi yang sangat menarik, kraetif, dan inspiratif berbeda dengan website website lainnya</p>
		</div>
	
		<div class="f" style="float:left;" >
            <ul class="header">

                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="resep.html">Resep</a>
                </li>
                <li>
                    <a href="bahandanalat.html">Bahan & Alat</a>
                </li>
                <li>
                    <a>Bantuan</a>
                </li>
                <li>
                    <a href="tentangKami.html">Tentang Kami</a>
                </li>

            </ul>
        </div>
        
		<div class="contact">
		  <img src="fb.png" /> <p>FunToCook</p>
		  <img src="twitter.png" /> <p>@FunToCook</p>
		  <br/>
		  <hr/>
		  <br/>
		  <img src="email.png" /><p>FunToCook@gmail.com</p>
		  <img src="phone.png" /><p>+6285655041730</p>
		</div>
	<footer>
   
</body>
</html>
