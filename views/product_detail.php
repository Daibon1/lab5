<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Chi tiết sản phẩm</h2>

<?php if ($product): ?>
<div class="card" style="width: 22rem;">
    <?php if (!empty($product['image'])): ?>
        <img src="<?= $product['image'] ?>" class="card-img-top">
    <?php endif; ?>

    <div class="card-body">
        <h5 class="card-title"><?= $product['name'] ?></h5>
        <p class="card-text">Giá: <?= number_format($product['price']) ?> VND</p>
        <p class="card-text"><?= $product['description'] ?></p>

        <a href="index.php?page=products" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
<?php else: ?>
<p>Không tìm thấy sản phẩm!</p>
<?php endif; ?>

</body>
</html>
