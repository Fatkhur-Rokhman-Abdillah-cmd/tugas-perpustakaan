<?php
require_once "koneksi.php";

$id = $_GET["id"];
$sql = "SELECT * FROM anggota WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) == 0){
    die("Data anggota tidak ditemukan");
}

$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Anggota</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px auto;
      padding: 0 15px;
      max-width: 600px;
      color: #333;
    }

    h1 {
      color: #1f3864;
    }

    label {
      display: block;
      margin-top: 12px;
      font-weight: bold;
    }

    input[type="text"],
    select,
    textarea {
      box-sizing: border-box;
      width: 100%;
      padding: 8px;
      margin-top: 4px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      margin-top: 16px;
      padding: 8px 18px;
      background: #1f3864;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .nav {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="nav">
    <a href="lihat_data_anggota.php">Daftar Anggota</a> |
    <a href="form_anggota.php">Pendaftaran Anggota Baru</a>
  </div>

  <h1>Edit Data Anggota</h1>

  <form action="proses_update.php" method="post">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label for="no_anggota">Nomor Anggota</label>
    <input type="text" id="no_anggota" name="no_anggota" maxlength="15" value="<?= htmlspecialchars($data['no_anggota']); ?>" required>

    <label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" id="nama_lengkap" name="nama_lengkap" maxlength="100" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" maxlength="100" value="<?= htmlspecialchars($data['email']); ?>" required>

    <label for="no_hp">Nomor HP</label>
    <input type="text" id="no_hp" name="no_hp" maxlength="13" value="<?= htmlspecialchars($data['no_hp']); ?>" required>

    <label for="jenis_anggota">Jenis Anggota</label>
    <select id="jenis_anggota" name="jenis_anggota" required>
      <option value="">-- Pilih Jenis Anggota --</option>
      <option value="Mahasiswa" <?= ($data['jenis_anggota'] === 'Mahasiswa') ? 'selected' : ''; ?>>Mahasiswa</option>
      <option value="Dosen" <?= ($data['jenis_anggota'] === 'Dosen') ? 'selected' : ''; ?>>Dosen</option>
      <option value="Tenaga Kependidikan" <?= ($data['jenis_anggota'] === 'Tenaga Kependidikan') ? 'selected' : ''; ?>>Tenaga Kependidikan</option>
    </select>

    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" rows="4" required><?= htmlspecialchars($data['alamat']); ?></textarea>

    <button type="submit">Simpan Perubahan</button>
  </form>
</body>
</html>
