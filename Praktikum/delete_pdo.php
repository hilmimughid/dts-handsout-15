<?php
require 'db_connect.php';

$id = 1;

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $id]);

echo "User berhasil dihapus";
