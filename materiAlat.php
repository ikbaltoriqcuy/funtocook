<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TypeScript HTML App</title>
    <link rel="stylesheet" href="css/materi.css" type="text/css" />
    <script src="app.js"></script>
</head>
<body>

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
    <br /> <br/>
	<?php 
	   include('conn.php');
           $json = file_get_contents('./sendmateri.json');
		   $json_data = json_decode($json,true);
		   $id_artikel =$json_data["id_resep"];
		   
		$sql = 'SELECT * FROM ARTIKELBAHAN_ALAT WHERE ID_ARTIKEL = :id ';
		$stid = oci_parse($conn, $sql);
		$id = 60;
		oci_bind_by_name($stid, ':id', $id_artikel);
		oci_execute($stid);
		while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
			?>
	            <div class="title">
					<h1><?php echo $row['JUDUL']; ?> </h1>
				</div>
                
    <div class="n" >
        <div class="materi">
            <div class="content-materi">
                <div align="center">
                    <img src=<?php echo "'".$row['GAMBAR']."'"; ?> height="20%" width="30%" />
                </div>
                <p>
				 <?php echo $row['ISI_ARTIKEL']; ?>
                </p>
                <div class="play" align="right">
				   <a href="simulasi.html">
                    <input id="button" type="button" value="Play" />
					</a>
                </div>
            </div>
        </div>
    </div>
				
			<?php
		}
	?>
    
    <div id="content"></div>
</body>
</html>
