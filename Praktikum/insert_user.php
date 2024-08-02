<?php
// Kode sebelum modifikasi:
// require 'db_connect.php';

// $username = $_POST['username'];
// $email = $_POST['email'];

// $sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
// $stmt = $pdo->prepare($sql);

// $stmt->execute(['username' => $username, 'email' => $email]);

// echo "User berhasil ditambahkan";

// Kode setelah modifikasi:
require 'db_connect.php';

$username = $_POST['username'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute(['username' => $username, 'email' => $email]);

$stmt->bindParam(':username', $name);
$stmt->bindParam(':email', $email);

$name = "Budi";
$email = "budi@email.com";
$stmt->execute();

echo "User berhasil ditambahkan";
