<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'products';

$controller = new ProductController();

if ($page === 'products') {
    $controller->index();
}
elseif ($page === 'product-delete') {
    $controller->delete();
}
elseif ($page === 'product-detail') {
    $controller->detail();
}
elseif ($page === 'product-add') {
    $controller->create();
}
elseif ($page === 'product-store') {
    $controller->store();
}
elseif ($page === 'product-edit') {
    $controller->edit();
}
elseif ($page === 'product-update') {
    $controller->update();
}

else {
    echo "404 - Page Not Found";
}
