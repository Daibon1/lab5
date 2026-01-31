<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        include __DIR__ . '/../../views/product_list.php';
    }
    public function delete() {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $productModel = new Product();
        $productModel->delete($id);
    }

    header("Location: index.php?page=products");
    exit();
}

    public function detail() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Không tìm thấy sản phẩm!";
        return;
    }

    $productModel = new Product();
    $product = $productModel->find($id);

    include __DIR__ . '/../../views/product_detail.php';
}
public function create() {
    include __DIR__ . '/../../views/product-add.php';
}
public function store() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die("Sai phương thức POST");
    }

    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';

    if ($name == '' || $price == '') {
        die("Thiếu tên hoặc giá");
    }

    // Upload ảnh
    $imagePath = null;

    if (!empty($_FILES['image']['name'])) {
        $fileName = time() . '_' . $_FILES['image']['name'];
        $target = 'uploads/' . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $imagePath = $target;
    }

    $product = new \App\Models\Product();
    $product->insert([
        'name' => $name,
        'price' => $price,
        'description' => $_POST['description'] ?? '',
        'image' => $imagePath
    ]);

    // Redirect CHUẨN
    header("Location: index.php");
    exit;
}


public function edit() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Không tìm thấy ID!";
        return;
    }

    $productModel = new \App\Models\Product();
    $product = $productModel->find($id);

    include __DIR__ . '/../../views/product_edit.php';
}
public function update() {
    $id = $_GET['id'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$id) {
        die("Dữ liệu không hợp lệ!");
    }

    $data = [
        'name' => $_POST['name'] ?? '',
        'price' => $_POST['price'] ?? '',
        'description' => $_POST['description'] ?? '',
        'image' => $_POST['image'] ?? ''
    ];

    if (empty($data['name']) || empty($data['price'])) {
        echo "Tên và Giá không được để trống!";
        return;
    }

    $productModel = new \App\Models\Product();
    $productModel->update($id, $data);

    header("Location: index.php?page=products");
    exit();
}


}
