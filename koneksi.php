<?php
<<<<<<< HEAD
=======
mysqli_report(MYSQLI_REPORT_OFF);

>>>>>>> 6ed02d92e1b412a774ddd437c2098c31c6fdfc91
$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

$koneksi = mysqli_connect($host, $username, $password, $database);
<<<<<<< HEAD

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

=======
if (!$koneksi) {
    die("Koneksi gagal: " . htmlspecialchars(mysqli_connect_error(), ENT_QUOTES, "UTF-8"));
}
if (!mysqli_set_charset($koneksi, "utf8mb4")) {
    die("Gagal mengatur karakter database: " . htmlspecialchars(mysqli_error($koneksi), ENT_QUOTES, "UTF-8"));
}
>>>>>>> 6ed02d92e1b412a774ddd437c2098c31c6fdfc91
