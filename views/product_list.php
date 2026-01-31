<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Danh sách sản phẩm</h2>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['name'] ?></td>
            <td><?= number_format($p['price']) ?> VND</td>
            <td>
            <?php if (!empty($p['image'])): ?>
                <img src="<?= $p['image'] ?>" width="80" height="80"
                    style="object-fit:cover;border-radius:6px;">
            <?php else: ?>
                <span class="text-muted">Chưa có ảnh</span>
            <?php endif; ?>
            </td>


            <td>
                <a href="index.php?page=product-detail&id=<?= $p['id'] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                <a href="index.php?page=product-edit&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                <a href="index.php?page=product-delete&id=<?= $p['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Bạn có chắc muốn xóa?')">
                Xóa
                </a>
                <a href="index.php?page=product-add" class="btn btn-primary mb-3">
                + Thêm sản phẩm
</a>

</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
