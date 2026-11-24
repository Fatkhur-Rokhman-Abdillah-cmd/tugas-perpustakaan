<?php
$status = isset($_GET["status"]) ? (string) $_GET["status"] : "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Anggota Perpustakaan</title>
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

    .sukses {
      background: #e8f5e9;
      border-left: 4px solid #2e7d32;
      padding: 10px 14px;
      color: #1b5e20;
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
  <h1>Pendaftaran Anggota Perpustakaan Kampus</h1>
  <?php if ($status === "sukses") { ?>
    <p class="sukses">Pendaftaran anggota berhasil disimpan.</p>
  <?php } ?>
  <form action="proses_anggota.php" method="post">
    <label for="no_anggota">Nomor Anggota</label>
    <input type="text" id="no_anggota" name="no_anggota" maxlength="15" inputmode="numeric">

    <label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" id="nama_lengkap" name="nama_lengkap" maxlength="100">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" maxlength="100" inputmode="email">

    <label for="no_hp">Nomor HP</label>
    <input type="text" id="no_hp" name="no_hp" maxlength="13" inputmode="numeric">

    <label for="jenis_anggota">Jenis Anggota</label>
    <select id="jenis_anggota" name="jenis_anggota">
      <option value="">-- Pilih Jenis Anggota --</option>
      <option value="Mahasiswa">Mahasiswa</option>
      <option value="Dosen">Dosen</option>
      <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
    </select>

    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" rows="4"></textarea>

    <button type="submit">Daftar Anggota</button>
  </form>
</body>
</html>
