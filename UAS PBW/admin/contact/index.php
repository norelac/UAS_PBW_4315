<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}

include "../../backend/config/database.php";
$q = mysqli_query($conn, "SELECT * FROM contact ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Masuk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 30px;
    }
    .container {
      background: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      vertical-align: top;
    }
    th {
      background: #f1f3f5;
      text-align: left;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>📩 Pesan Masuk</h2>

  <table>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Pesan</th>
      <th>Tanggal</th>
    </tr>

    <?php while ($c = mysqli_fetch_assoc($q)) { ?>
      <tr>
        <td><?= htmlspecialchars($c['nama']); ?></td>
        <td><?= htmlspecialchars($c['email']); ?></td>
        <td><?= nl2br(htmlspecialchars($c['pesan'])); ?></td>
        <td><?= $c['created_at'] ?? '-'; ?></td>
      </tr>
    <?php } ?>
  </table>

</div>

</body>
</html>
