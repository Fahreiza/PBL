<?php
$server = "REI\\MSSQLSERVER2022";
$database = "sibatta";
$username = "";
$password = "";
$connInfo = array("Database" => $database, "UID" => $username, "PWD" => $password);
$conn = sqlsrv_connect($server, $connInfo);

if ($conn) {
    // Prepared query to check credentials
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$username));
    sqlsrv_execute($stmt);
    
    $user = sqlsrv_fetch_array($stmt);
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct
        $_SESSION['username'] = $username;
        header('Location: main.php');
        exit();
    } else {
        $message = "Invalid NIM or Password!";
    }
} else {
    $message = "Database connection failed!";
}
?>
