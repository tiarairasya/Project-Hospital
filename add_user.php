<?php
include 'koneksi.php';

$username = 'tiara';
$password = '1804';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashed_password);

if ($stmt->execute()) {
    echo "User berhasil ditambahkan!";
} else {
    echo "Error: Gagal menambahkan user.";
}

$conn = null;
?>
