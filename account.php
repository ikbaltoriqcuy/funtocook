<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TypeScript HTML App</title>
    <link rel="stylesheet" href="accountWriter.css" type="text/css" />
    <script src="app.js"></script>
</head>
<body>
    <div class="header">
        <?php 
		   include('header.php');
		
		?>
        <div class="Account"> 
		<?php 
		 session_start();
			   if ($_SESSION['username']) {
				
		?>
            <h1>Hello <?php echo $_SESSION['username']; ?>!!</h1>
            <br /><br />
			<?php
			   include('conn.php');
			  $stid = oci_parse($conn, "SELECT * FROM admin where USERNAME = '".$_SESSION['username']."' ");
					oci_execute($stid);
					while (($row = oci_fetch_array($stid, OCI_ASSOC))) {
			?>
            <form method='post'>
                <label>Your Username</label><br />
                <input id="Text1" type="text" value='<?php echo $row['USERNAME'];  ?>' name='user' required/><br />
                <label>Nama</label><br />
                <input id="Text1" type="text" value='<?php echo $row['NAMA']; ?>' name='nama' required/><br />
                <label>Alamat</label><br />
                <input id="Text1" type="text" value='<?php echo $row['ALAMAT']; ?>' name='alamat' required/><br />
				<label>Password</label><br />
                <input id="Text1" type="password" value='<?php echo $row['PASSWORD']; ?>' name ='p' required/><br />
				<label>noHandphone</label><br />
                <input id="Text1" type="text"  value='<?php echo $row['NOHP']; ?>' name ='no' required/><br />
				
                <hr />
                <label>Confirm Password</label><br />
                <input id="Text1" type="password" name='curpass'  required/>
				<br/>
				<br/>
				<br/>
                <input id="Button1" type="submit" name='submit' value="Save Changes" />
            </form>
			<?php
					}
			   }
			?>
        </div>
		<?php 
		 if (isset($_POST['submit'])) {
			 $user = $_POST['user'];
			 $nama = $_POST['nama'];
			 $alamat = $_POST['alamat'];
			 $pass = $_POST['p'];
			 $no = $_POST['no'];
			 $cur = $_POST['curpass'];
             $pass1 = $_SESSION['pass'];  			 
			 if ($cur == $pass1 ) {
				 $username =$_SESSION['username'];
				 $stmt = oci_parse($conn, "UPDATE admin ".
                             "SET    USERNAME = '$user',".
							 "       NAMA = '$nama',".
							 "       ALAMAT = '$alamat',".
							 "       PASSWORD = '$pass',".
							 "       NOHP = '$no'".
                             "WHERE  USERNAME = '$username'");
                 

				oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
				oci_free_statement($stmt);
				header("location:login.php");
			 } else {
				 echo "password salah!!";
			 }
		 }
		
		?>
    </div>
</body>
</html>
