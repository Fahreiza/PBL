<?php
$host     = "REI\MSSQLSERVER2022";  // Server name and instance
$database = "sibatta";                      // Your database name
$username = "";                               // Database username if applicable
$password = "";                               // Database password if applicable

// Connection options
$connInfo = array("Database" => $database, "UID" => $username, "PWD" => $password);
$conn     = sqlsrv_connect($host, $connInfo);

// Check if connection was successful
if (!$conn) {
    echo "Koneksi Gagal";
    die(print_r(sqlsrv_errors(), true));
}
?>