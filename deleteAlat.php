<?php
include("conn.php");
$id = $_GET['id'];

    // Parse a delete statement containing bind variables.
    $stmt = oci_parse($conn, "DELETE FROM artikelbahan_alat ".
                             "WHERE  ID_ARTIKEL = :id");


    // Bind the values into the parsed statement.
    oci_bind_by_name($stmt, ":id", $id);
    oci_execute($stmt, OCI_DEFAULT);
    oci_commit($conn);
    oci_free_statement($stmt);
?>