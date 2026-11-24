<?php
require_once "koneksi.php";

$status = isset($_GET["status"]) ? (string) $_GET["status"] : "";

$sql = "SELECT * FROM anggota ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Anggota Perpustakaan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px auto;
      padding: 0 15px;
      max-width: 950px;
      color: #333;
    }

    h1 {
      color: #1f3864;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    .nav {
      margin-bottom: 20px;
    }

    .btn-edit {
      color: #322bc0ff;
      text-decoration: none;
      font-weight: bold;
    }

    .btn-edit:hover {
      text-decoration: underline;
    }
    .btn-hapus {
      color: #c0392b;
      text-decoration: none;
      font-weight: bold;
    }

    .btn-hapus:hover {
      text-decoration: underline;
    }

    .alert {
      padding: 10px 14px;
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .alert-sukses {
      background: #e8f5e9;
      border-left: 4px solid #2e7d32;
      color: #1b5e20;
    }

    .alert-gagal {
      background: #fdecea;
      border-left: 4px solid #c0392b;
      color: #78281f;
    }
  </style>
</head>
<body>
  <div class="nav">
    <a href="lihat_data_anggota.php">Daftar Anggota</a> |
    <a href="form_anggota.php">Pendaftaran Anggota Baru</a>
  </div>

  <h1>Daftar Anggota Perpustakaan</h1>

  <?php if ($status === "hapus_sukses") { ?>
    <div class="alert alert-sukses">Data anggota berhasil dihapus.</div>
  <?php } elseif ($status === "hapus_gagal") { ?>
    <div class="alert alert-gagal">Gagal menghapus data anggota.</div>
  <?php } elseif ($status === "update_sukses") { ?>
    <div class="alert alert-sukses">Data anggota berhasil diperbarui.</div>
  <?php } ?>

  <?php if (!$result || mysqli_num_rows($result) === 0) { ?>
    <p>Belum ada data anggota.</p>
  <?php } else { ?>
    <table>
      <thead>
        <tr>
          <th>No. Anggota</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>No. HP</th>
          <th>Jenis Anggota</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row["no_anggota"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($row["nama_lengkap"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($row["email"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($row["no_hp"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($row["jenis_anggota"], ENT_QUOTES, "UTF-8"); ?></td>
            <td><?php echo htmlspecialchars($row["alamat"], ENT_QUOTES, "UTF-8"); ?></td>
            <td>              
              <a href="edit_anggota.php?id=<?= $row['id']; ?>" 
                 class="btn-edit">
                Edit
              </a> |
              <a href="hapus_anggota.php?id=<?= $row['id']; ?>" 
                 class="btn-hapus"
                 onclick="return confirm('Apakah Anda yakin ingin menghapus data anggota ini?');">
                Hapus
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>

  <?php
  if ($result) {
      mysqli_free_result($result);
  }
  mysqli_close($koneksi);
  ?>
</body>
</html>