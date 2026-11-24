<?php
if (isset($_GET["id"])) {
    require_once "koneksi.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM anggota WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);
            header("Location: lihat_data_anggota.php?status=hapus_sukses");
            exit;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($koneksi);
    header("Location: lihat_data_anggota.php?status=hapus_gagal");
    exit;
} else {
    header("Location: lihat_data_anggota.php");
    exit;
}
