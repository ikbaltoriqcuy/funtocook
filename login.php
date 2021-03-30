<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
    <link href="login.css" rel="stylesheet" />
</head>
<body >
    <div class="konten" align="center">
        <img src="logo1.png" height="40%" width="30%" />
        <form method='post'>
           <label>Username : </label><br />  <input type="text" name='user' /><br /><br />
           <label>Password :</label><br /> <input type="password" name='pass' /><br /><br />
		   <input type="submit" name='goto' value="LOGIN"  />   
        </form>
         
		<?php  
		include('conn.php');
		  if (isset($_POST['goto'])) {
			  $user = $_POST['user'];
			  $pass = $_POST['pass'];
				$stid = oci_parse($conn, 'SELECT * FROM admin');
				oci_execute($stid);
				while (($row = oci_fetch_array($stid, OCI_ASSOC))) {
					if ($row['USERNAME']== $user && $row['PASSWORD']== $pass ) {
						session_start(); 
						$_SESSION['username'] = $row['USERNAME'];
						$_SESSION['pass'] = $row['PASSWORD'];
                             						
						header('location:account.php');
					}
				}
		  }
		?>
		
    </div>
</body>
</html>
