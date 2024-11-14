<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$order = isset($_GET['order']) ? $_GET['order'] : 'nomor_antrian';

$sql = "SELECT * FROM antrian ORDER BY $order";
$stmt = $conn->prepare($sql);
$stmt->execute();
$antrian = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #E6E6FA;
        }
        h2 {
            color: #6A0DAD;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #6A0DAD;
            color: white;
        }
        .order-form {
            margin-bottom: 15px;
        }
        .btn {
            padding: 8px 12px;
            background-color: #6A0DAD;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #8A2BE2;
        }
        .notification {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Daftar Antrian Pasien</h2>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'updated') : ?>
        <div class="notification">
            Status berhasil diubah menjadi 'Diproses'.
        </div>
    <?php endif; ?>

    <form class="order-form" method="GET" action="daftar_antrian.php">
        Urutkan berdasarkan:
        <select name="order" onchange="this.form.submit()">
            <option value="nomor_antrian" <?php if ($order == 'nomor_antrian') echo 'selected'; ?>>Nomor Antrian</option>
            <option value="waktu_kedatangan" <?php if ($order == 'waktu_kedatangan') echo 'selected'; ?>>Waktu Kedatangan</option>
        </select>
    </form>
    <a href="tambah_antrian.php" class="btn">Tambah Antrian</a>
    <a href="logout.php" class="btn">Logout</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Nomor Antrian</th>
            <th>Waktu Kedatangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
if (count($antrian) > 0) {
    $no = 1;
    foreach ($antrian as $row) {
        echo "<tr>
        <td>".$no."</td>
        <td>".$row["nama_pasien"]."</td>
        <td>".$row["nomor_antrian"]."</td>
        <td>".$row["waktu_kedatangan"]."</td>
        <td>".($row["status"] ? $row["status"] : 'Menunggu')."</td>
        <td><a href='ubah_status.php?id=".$row["id"]."'>Ubah Status</a> | <a href='hapus_antrian.php?id=".$row["id"]."'>Hapus</a></td>
        </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada antrian.</td></tr>";
}
?>

    </table>
</body>
</html>
