<?php
require 'connection.php';

// Cek apakah kolom pass sudah ada
$sql = "SHOW COLUMNS FROM mhs LIKE 'pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    // Tambah kolom pass jika belum ada
    $alterSql = "ALTER TABLE mhs ADD COLUMN pass VARCHAR(255) NOT NULL DEFAULT ''";
    if (mysqli_query($conn, $alterSql)) {
        echo "Kolom 'pass' berhasil ditambahkan ke tabel mhs<br>";
    } else {
        echo "Error: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Kolom 'pass' sudah ada<br>";
}

// Hash password untuk user yang ada (A12.2024.07239)
$password = "12345"; // Password default
$hashed = password_hash($password, PASSWORD_DEFAULT);

$updateSql = "UPDATE mhs SET pass = '$hashed' WHERE nim = 'A12.2024.07239'";
if (mysqli_query($conn, $updateSql)) {
    echo "Password untuk NIM A12.2024.07239 berhasil diset<br>";
    echo "Password: 12345<br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
