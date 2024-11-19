Aplikasi Antrian Rumah Sakit
Deskripsi Proyek
Proyek ini adalah aplikasi sederhana untuk mengelola antrian pasien di rumah sakit. Aplikasi ini dikembangkan menggunakan PHP dan MySQL dengan fitur utama seperti menambahkan antrian, mengubah status, dan menghapus data antrian.

Kesulitan yang Dihadapi
Selama mengembangkan proyek ini, saya menghadapi beberapa kesulitan, antara lain:
1. Logika Pengubahan Status
Masalah: Awalnya sulit untuk membuat fungsi "Ubah Status" agar dapat secara otomatis memperbarui status di database dan menampilkan hasilnya di tampilan UI tanpa error.
Solusi: Saya belajar lebih dalam tentang penggunaan query SQL UPDATE dan memisahkan file PHP khusus untuk menangani perubahan status.
2. Error Syntax PHP
Masalah: Beberapa kali mengalami error seperti Parse error: syntax error, unexpected... karena kesalahan dalam menulis kode PHP di dalam string HTML.
Solusi: Dengan bantuan debugging, saya belajar untuk memisahkan PHP dan HTML dengan benar menggunakan <?php ?> di lokasi yang tepat.
3. Notifikasi Status
Masalah: Tidak tahu bagaimana cara menampilkan pesan konfirmasi (notifikasi) ketika status berhasil diubah.
Solusi: Saya menggunakan parameter URL ($_GET['status']) dan mempelajari cara menampilkan elemen HTML secara dinamis berdasarkan kondisi tersebut.
4. Validasi Data
Masalah: Saya kesulitan memastikan bahwa input data dari user seperti nama pasien dan nomor antrian tidak kosong atau salah.
Solusi: Saya menambahkan validasi pada input form dan mempelajari penggunaan statement prepared PDO untuk menghindari SQL injection.
Pelajaran yang Didapat

Selama menyelesaikan proyek ini, saya banyak belajar:
- Menggunakan PDO untuk mengelola database dengan lebih aman.
- Menulis kode yang lebih terstruktur dengan memisahkan file berdasarkan fungsinya (misalnya, ubah_status.php dan hapus_antrian.php).
- Mengatasi error dengan membaca pesan error dan mencoba memperbaikinya secara sistematis.
- Pentingnya user interface (UI) yang sederhana namun informatif untuk meningkatkan pengalaman pengguna.
- 
Teknologi yang Digunakan
1. Bahasa Pemrograman: PHP
2. Database: MySQL
3. Server: XAMPP
4. Library: PDO untuk pengelolaan database
