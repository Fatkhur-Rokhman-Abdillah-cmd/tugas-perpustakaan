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
      margin: 32px auto;
      padding: 0 18px;
      max-width: 680px;
      color: #243247;
    }

    h1 {
      color: #1f3864;
    }

    label {
      display: block;
      margin-top: 14px;
      font-weight: bold;
    }

    input,
    select,
    textarea {
      box-sizing: border-box;
      width: 100%;
      max-width: 520px;
      padding: 9px;
      margin-top: 5px;
    }

    button {
      margin-top: 18px;
      padding: 10px 22px;
      background: #1f3864;
      color: white;
      border: 0;
      border-radius: 4px;
      cursor: pointer;
    }

    .sukses {
      background: #e8f5e9;
      border-left: 5px solid #2e7d32;
      padding: 12px;
      max-width: 500px;
    }
  </style>
</head>
<body>
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
