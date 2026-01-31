<!DOCTYPE html>
<html>
<head>
<title>Thêm sản phẩm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Thêm sản phẩm</h2>

<form action="index.php?page=product-store" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Giá</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Lưu</button>
    <a href="index.php?page=product-list" class="btn btn-secondary">Quay lại</a>

</form>

</body>
</html>
