<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form_anggota.php");
    exit;
}

$no_anggota    = isset($_POST["no_anggota"]) ? trim($_POST["no_anggota"]) : "";
$nama_lengkap  = isset($_POST["nama_lengkap"]) ? trim($_POST["nama_lengkap"]) : "";
$email         = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$no_hp         = isset($_POST["no_hp"]) ? trim($_POST["no_hp"]) : "";
$jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : "";
$alamat        = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";

$errors = [];
$daftar_jenis = ["Mahasiswa", "Dosen", "Tenaga Kependidikan"];

if ($no_anggota === "") {
    $errors[] = "Nomor anggota wajib diisi.";
} elseif (!ctype_digit($no_anggota)) {
    $errors[] = "Nomor anggota hanya boleh berisi angka.";
} elseif (strlen($no_anggota) > 15) {
    $errors[] = "Nomor anggota maksimal 15 digit.";
}

if (empty($nama_lengkap)) {
    $errors[] = "Nama lengkap wajib diisi.";
} elseif (strlen($nama_lengkap) > 100) {
    $errors[] = "Nama lengkap maksimal 100 karakter.";
}

if (empty($email)) {
    $errors[] = "Email wajib diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
} elseif (strlen($email) > 100) {
    $errors[] = "Email maksimal 100 karakter.";
}

if ($no_hp === "") {
    $errors[] = "Nomor HP wajib diisi.";
} elseif (!ctype_digit($no_hp)) {
    $errors[] = "Nomor HP hanya boleh berisi angka.";
} elseif (strlen($no_hp) < 10 || strlen($no_hp) > 13) {
    $errors[] = "Nomor HP harus terdiri dari 10 sampai 13 digit.";
}

if (empty($jenis_anggota)) {
    $errors[] = "Jenis anggota wajib dipilih.";
} elseif (!in_array($jenis_anggota, $daftar_jenis)) {
    $errors[] = "Jenis anggota tidak valid.";
}

if (empty($alamat)) {
    $errors[] = "Alamat wajib diisi.";
}

$pesan_db = "";
if (empty($errors)) {
    require_once "koneksi.php";
    $sql = "INSERT INTO anggota (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $no_anggota, $nama_lengkap, $email, $no_hp, $jenis_anggota, $alamat);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);
            header("Location: form_anggota.php?status=sukses");
            exit;
        }
        $pesan_db = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $pesan_db = mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pendaftaran</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px auto;
      max-width: 650px;
      color: #333;
    }
    h1 {
      color: #1f3864;
    }
    .gagal {
      background: #fdecea;
      border-left: 5px solid #c0392b;
      padding: 12px;
    }
  </style>
</head>
<body>
<?php if (!empty($errors)) { ?>
  <h1>Data Tidak Valid</h1>
  <p class="gagal">Data belum disimpan. Perbaiki kesalahan berikut:</p>
  <ul>
    <?php foreach ($errors as $pesan) { ?>
      <li><?php echo htmlspecialchars($pesan, ENT_QUOTES, "UTF-8"); ?></li>
    <?php } ?>
  </ul>
<?php } else { ?>
  <h1>Pendaftaran Gagal Disimpan</h1>
  <p class="gagal">Terjadi kesalahan saat menyimpan data ke database.</p>
  <p>Penyebab: <?php echo htmlspecialchars($pesan_db, ENT_QUOTES, "UTF-8"); ?></p>
<?php } ?>
<p><a href="form_anggota.php">Kembali ke formulir</a></p>
</body>
</html>
