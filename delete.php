<?php

include("conn.php");

    // Parse a delete statement containing bind variables.
    $stmt = oci_parse($conn, "DELETE FROM artikelresep ".
                             "WHERE  ID_ARTIKEL = :id");

$id = $_GET['id'];
    oci_bind_by_name($stmt, ":id", $id);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_free_statement($stmt);
	
?>