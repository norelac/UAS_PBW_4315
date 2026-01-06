<?php
session_start();
include "../../backend/config/database.php";
$q = mysqli_query($conn, "SELECT * FROM project");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Project</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --danger: #ef4444;
      --danger-dark: #b91c1c;
      --bg: #f8fafc;
      --card: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --border: #e5e7eb;
      --radius: 14px;
      --shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    /* Container */
    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }

    /* Card */
    .card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 25px;
      box-shadow: var(--shadow);
    }

    /* Header */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    h2 {
      margin: 0;
      font-size: 22px;
    }

    .btn-add {
      background: var(--primary);
      color: #fff;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: background 0.2s;
    }

    .btn-add:hover {
      background: var(--primary-dark);
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    th {
      text-align: left;
      padding: 12px;
      background: #f1f5f9;
      color: #475569;
      font-weight: 600;
      border-bottom: 1px solid var(--border);
    }

    td {
      padding: 12px;
      border-bottom: 1px solid var(--border);
    }

    tr:hover td {
      background: #f8fafc;
    }

    /* Actions */
    .btn-delete {
      color: var(--danger);
      text-decoration: none;
      font-weight: 500;
      font-size: 13px;
      transition: color 0.2s;
    }

    .btn-delete:hover {
      color: var(--danger-dark);
      text-decoration: underline;
    }

    /* Back */
    .back {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: var(--muted);
      font-size: 14px;
    }

    .back:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="top-bar">
        <h2>Kelola Project</h2>
        <a href="tambah.php" class="btn-add">+ Tambah Project</a>
      </div>

      <table>
        <tr>
          <th>Judul Project</th>
          <th width="120">Aksi</th>
        </tr>

        <?php while ($p = mysqli_fetch_assoc($q)) { ?>
          <tr>
            <td><?= htmlspecialchars($p['judul']); ?></td>
            <td>
              <a href="hapus.php?id=<?= $p['id']; ?>" class="btn-delete"
                 onclick="return confirm('Yakin ingin menghapus project ini?')">
                Hapus
              </a>
            </td>
          </tr>
        <?php } ?>
      </table>

      <a href="../dashboard.php" class="back">← Kembali ke Dashboard</a>
    </div>
  </div>

</body>
</html>
