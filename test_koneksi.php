<?php
require_once "koneksi.php";
$versi_server = mysqli_get_server_info($koneksi);
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tes Koneksi Database</title>
  <style>
    body{font-family:Arial,sans-serif;margin:40px;color:#243247}
    .sukses{background:#e8f5e9;border-left:5px solid #2e7d32;padding:14px;max-width:520px}
  </style>
</head>
<body>
  <h1>Tes Koneksi Database</h1>
  <p class="sukses">Koneksi ke MySQL berhasil.</p>
  <p>Host: <?php echo htmlspecialchars($host, ENT_QUOTES, "UTF-8"); ?></p>
  <p>Database: <?php echo htmlspecialchars($database, ENT_QUOTES, "UTF-8"); ?></p>
  <p>Versi server: <?php echo htmlspecialchars($versi_server, ENT_QUOTES, "UTF-8"); ?></p>
</body>
</html>
