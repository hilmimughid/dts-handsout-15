<?php
$host = 'localhost';
$dbname = 'my_database';
$user = 'root';
$pass = '';

try {
    $dsn = "mysql:host=$host;dbname=$dbname; charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Koneksi berhasil <br>";

    $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            price FLOAT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

    $pdo->exec($sql);

    echo "Tabel 'products' berhasil dibuat <br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
