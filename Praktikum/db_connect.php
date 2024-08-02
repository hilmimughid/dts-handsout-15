<?php
$host = 'localhost';
$db = 'praktikum_15';
$user = 'root';
$pass = '';

try {
    $dsn = "mysql:host=$host;dbname=$db; charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
