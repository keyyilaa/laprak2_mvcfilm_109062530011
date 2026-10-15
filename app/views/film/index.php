<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Film</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Daftar Film</h2>

    <?php if (!empty($flash)): ?>
        <div class="alert <?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <a class="btn" href="index.php?page=film&action=create">Tambah Film</a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        <?php if (empty($films)): ?>
            <tr><td colspan="7">Belum ada data film.</td></tr>
        <?php endif; ?>
        <?php foreach ($films as $i => $f): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars($f['rating']) ?></td>
            <td>
                <a class="btn btn-edit" href="index.php?page=film&action=edit&id=<?= (int) $f['id'] ?>">Edit</a>
                <form method="post" action="index.php?page=film&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus film ini?')">
                    <input type="hidden" name="id" value="<?= (int) $f['id'] ?>">
                    <button type="submit" class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>