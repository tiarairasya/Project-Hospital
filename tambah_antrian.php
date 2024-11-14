<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pasien = $_POST['nama_pasien'];
    $nomor_antrian = $_POST['nomor_antrian'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];

    $sql = "INSERT INTO antrian (nama_pasien, nomor_antrian, waktu_kedatangan, status) VALUES (:nama_pasien, :nomor_antrian, :waktu_kedatangan, 'Menunggu')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama_pasien', $nama_pasien);
    $stmt->bindParam(':nomor_antrian', $nomor_antrian);
    $stmt->bindParam(':waktu_kedatangan', $waktu_kedatangan);

    if ($stmt->execute()) {
        header("Location: daftar_antrian.php");
        exit;
    } else {
        echo "Gagal menambahkan data ke antrian.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #E6E6FA; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            max-width: 400px;
            padding: 20px;
            background-color: #FFFFE0; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            color: #6A0DAD; 
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: #6A0DAD;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Antrian Pasien</h2>
        <form name="antrianForm" method="POST" action="tambah_antrian.php" onsubmit="return validateForm()">
            Nama Pasien: <input type="text" name="nama_pasien" class="input-field" required><br>
            Nomor Antrian: <input type="number" name="nomor_antrian" class="input-field" required><br>
            Waktu Kedatangan: <input type="datetime-local" name="waktu_kedatangan" class="input-field" required><br>
            <input type="submit" value="Tambah Antrian" class="button">
        </form>
    </div>

    <script>
    function validateForm() {
        const nama = document.forms["antrianForm"]["nama_pasien"].value;
        const nomor = document.forms["antrianForm"]["nomor_antrian"].value;
        const waktu = document.forms["antrianForm"]["waktu_kedatangan"].value;

        if (nama == "" || nomor == "" || waktu == "") {
            alert("Semua kolom harus diisi!");
            return false;
        }
    }
    </script>
</body>
</html>
