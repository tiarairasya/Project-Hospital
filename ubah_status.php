<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE antrian SET status = 'Selesai' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: daftar_antrian.php?status=updated");
        exit;
    } else {
        echo "Gagal mengubah status.";
    }
} else {
    echo "ID antrian tidak ditemukan.";
}

$conn = null;
?>
