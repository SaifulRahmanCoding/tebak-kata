<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "asah_otak";
try {
    $db = mysqli_connect($host, $username, $password, $database);
} catch (\Throwable $th) {
    echo "gagal membuat koneksi";
}
